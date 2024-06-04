<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <div class="card shadow shadow-sm">
            <div class="card-body">
                <h1>DASHBOARD - <?= auth()->user()->username; ?></h1>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>