<?php

namespace App\Services\Admin;

class BookDataTableService {
    public function handle(array $request): array {
        $books = $this->books();
        $draw = (int) ($request['draw'] ?? 0);
        $start = max(0, (int) ($request['start'] ?? 0));
        $length = (int) ($request['length'] ?? 10);
        $length = $length > 0 ? $length : 10;
        $search = trim((string) ($request['search']['value'] ?? ''));
        $columns = $request['columns'] ?? [];
        $orderColumnIndex = (int) ($request['order'][0]['column'] ?? 0);
        $orderDirection = strtolower((string) ($request['order'][0]['dir'] ?? 'asc')) === 'desc' ? 'desc' : 'asc';
        $orderColumn = $columns[$orderColumnIndex]['data'] ?? 'title';

        $recordsTotal = count($books);
        $filtered = $this->filter($books, $search);
        $recordsFiltered = count($filtered);
        $ordered = $this->sort($filtered, $orderColumn, $orderDirection);
        $paginated = array_slice($ordered, $start, $length);

        return [
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => array_map([$this, 'transform'], $paginated),
        ];
    }

    private function filter(array $books, string $search): array {
        if ($search === '') {
            return $books;
        }

        $needle = mb_strtolower($search);

        return array_values(array_filter($books, function (array $book) use ($needle): bool {
            $haystack = mb_strtolower(implode(' ', [
                $book['title'],
                $book['author'],
                $book['genre'],
                $book['status'],
            ]));

            return str_contains($haystack, $needle);
        }));
    }

    private function sort(array $books, string $column, string $direction): array {
        $sortableColumns = ['title', 'author', 'genre', 'status', 'created_at'];

        if (!in_array($column, $sortableColumns, true)) {
            $column = 'title';
        }

        usort($books, function (array $left, array $right) use ($column, $direction): int {
            $result = strcmp((string) $left[$column], (string) $right[$column]);

            return $direction === 'desc' ? -$result : $result;
        });

        return $books;
    }

    private function transform(array $book): array {
        return [
            'title' => htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8'),
            'author' => htmlspecialchars($book['author'], ENT_QUOTES, 'UTF-8'),
            'genre' => htmlspecialchars($book['genre'], ENT_QUOTES, 'UTF-8'),
            'status' => $this->statusBadge($book['status']),
            'created_at' => htmlspecialchars($book['created_at'], ENT_QUOTES, 'UTF-8'),
            'actions' => $this->actions($book['id']),
        ];
    }

    private function statusBadge(string $status): string {
        $tone = match ($status) {
            'Publicado' => 'success',
            'Rascunho' => 'warning',
            default => 'secondary',
        };

        return sprintf(
            '<span class="badge text-bg-%s">%s</span>',
            $tone,
            htmlspecialchars($status, ENT_QUOTES, 'UTF-8')
        );
    }

    private function actions(int $id): string {
        $editUrl = route('admin.book') . '/edit/' . $id;

        return sprintf(
            '<a href="%s" class="btn btn-sm btn-outline-light">Editar</a>',
            htmlspecialchars($editUrl, ENT_QUOTES, 'UTF-8')
        );
    }

    private function books(): array {
        return [
            ['id' => 1, 'title' => 'A Torre do Tempo', 'author' => 'Marina Duarte', 'genre' => 'Fantasia', 'status' => 'Publicado', 'created_at' => '2026-03-20'],
            ['id' => 2, 'title' => 'Codigo Submerso', 'author' => 'Rafael Mendes', 'genre' => 'Ficcao cientifica', 'status' => 'Rascunho', 'created_at' => '2026-03-18'],
            ['id' => 3, 'title' => 'Jardim de Cinzas', 'author' => 'Helena Rocha', 'genre' => 'Drama', 'status' => 'Publicado', 'created_at' => '2026-03-14'],
            ['id' => 4, 'title' => 'Noite em Valkor', 'author' => 'Tiago Lopes', 'genre' => 'Aventura', 'status' => 'Revisao', 'created_at' => '2026-03-12'],
            ['id' => 5, 'title' => 'Atlas do Silencio', 'author' => 'Bianca Freitas', 'genre' => 'Misterio', 'status' => 'Publicado', 'created_at' => '2026-03-11'],
            ['id' => 6, 'title' => 'Reino de Sal', 'author' => 'Daniel Costa', 'genre' => 'Fantasia', 'status' => 'Rascunho', 'created_at' => '2026-03-10'],
            ['id' => 7, 'title' => 'Horizonte de Vidro', 'author' => 'Patricia Nunes', 'genre' => 'Suspense', 'status' => 'Publicado', 'created_at' => '2026-03-08'],
            ['id' => 8, 'title' => 'As Cartas de Orin', 'author' => 'Felipe Barros', 'genre' => 'Romance', 'status' => 'Revisao', 'created_at' => '2026-03-05'],
            ['id' => 9, 'title' => 'Manual do Ultimo Guardiao', 'author' => 'Laura Farias', 'genre' => 'Fantasia', 'status' => 'Publicado', 'created_at' => '2026-03-03'],
            ['id' => 10, 'title' => 'Cidade de Neon', 'author' => 'Igor Almeida', 'genre' => 'Cyberpunk', 'status' => 'Rascunho', 'created_at' => '2026-03-01'],
            ['id' => 11, 'title' => 'Mapa para o Inverno', 'author' => 'Clara Monteiro', 'genre' => 'Drama', 'status' => 'Publicado', 'created_at' => '2026-02-28'],
            ['id' => 12, 'title' => 'Arquivo 47', 'author' => 'Vitor Azevedo', 'genre' => 'Suspense', 'status' => 'Revisao', 'created_at' => '2026-02-25'],
        ];
    }
}
