<div class="container">
    <form action="" method="GET" class="d-flex mt-3 mb-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <div class="d-flex gap-3 justify-content-center align-items-center">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $helpers->asset('', 'img')  ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $value['title'] ?></h5>
                <p class="card-text"><?= $value['description'] ?></p>
                <a href="" class="btn btn-primary w-100">Go somewhere</a>
            </div>
        </div>
    </div>
</div>