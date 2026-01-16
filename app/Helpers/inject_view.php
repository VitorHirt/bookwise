<?php

use App\Core\View;

/* Sections */
function section(string $name): void
{
    View::start($name);
}

function endsection(): void
{
    View::end();
}

function yieldSection(string $name, string $default = ''): void
{
    View::yield($name, $default);
}

/* Stacks */
function push(string $name): void
{
    View::push($name);
}

function endpush(): void
{
    View::endPush();
}

function stack(string $name): void
{
    View::stack($name);
}
