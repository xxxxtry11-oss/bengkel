<div class="container mt-4">
    <div class="row">
        <!-- Sidebar Menu -->
        <div class="col-md-3 mb-4">
            <div class="card glass-card shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; font-size: 24px;">
                        <i class="bi bi-person-badge"></i>
                    </div>
                    <h5 class="card-title fw-bold mb-1"><?= html_escape($this->session->userdata('nama')) ?></h5>
                    <p class="text-muted small mb-0">@<?= html_escape($this->session->userdata('username')) ?></p>
                    <span class="badge bg-success mt-2 px-3 py-2 text-uppercase"><?= html_escape($this->session->userdata('role')) ?></span>
                </div>
                <div class="list-group list-group-flush border-top">
                    <a href="<?= base_url('backend/dashboard') ?>" class="list-group-item list-group-item-action"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                    <?php if($this->session->userdata('role') == 'admin'): ?>
                    <a href="<?= base_url('backend/kendaraan') ?>" class="list-group-item list-group-item-action"><i class="bi bi-car-front me-2"></i> Data Kendaraan</a>
                    <?php endif; ?>
                    <a href="<?= base_url('backend/servis') ?>" class="list-group-item list-group-item-action active"><i class="bi bi-tools me-2"></i> Data Servis</a>
                    <a href="#" class="list-group-item list-group-item-action text-danger" onclick="event.preventDefault(); window.location.href='<?= base_url('login/logout') ?>';"><i class="bi bi-box-arrow-right me-2"></i> Log out</a>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold text-primary mb-0"><i class="bi bi-plus-circle me-2"></i> Tambah Data Servis</h4>
                <a href="<?= base_url('backend/servis') ?>" class="btn btn-outline-secondary btn-sm shadow-sm hover-up transition">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 mb-3" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <?= $this->session->flashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="card glass-card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="<?= base_url('backend/servis/action_tambah') ?>" method="POST">
                        <div class="row g-4">
                            <!-- Pilih Pelanggan -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pilih Pelanggan <span class="text-danger">*</span></label>
                                <select name="id_pelanggan" id="pelangganSelect" class="form-select" required onchange="filterAntrian()">
                                    <option value="">-- Pilih Pelanggan --</option>
                                    <?php foreach($pelanggan as $p): ?>
                                        <option value="<?= $p->id ?>"><?= htmlspecialchars($p->nama) ?> (<?= htmlspecialchars($p->no_hp) ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Pilih Antrean -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pilih Daftar Antrean <span class="text-danger">*</span></label>
                                <select name="id_antrian" id="antrianSelect" class="form-select" required disabled>
                                    <option value="">-- Pilih Antrean Terlebih Dahulu --</option>
                                    <?php foreach($antrian as $a): ?>
                                        <!-- Hide initially, will be shown via JS -->
                                        <option value="<?= $a->id ?>" data-pelanggan="<?= $a->id_pelanggan ?>" style="display:none;">
                                            #<?= str_pad($a->no_antrian, 3, '0', STR_PAD_LEFT) ?> - <?= htmlspecialchars($a->merk) ?> <?= htmlspecialchars($a->tipe) ?> (<?= htmlspecialchars($a->plat_nomor) ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-text text-muted small mt-1">Hanya menampilkan antrean sesuai pelanggan yang dipilih.</div>
                            </div>

                            <!-- Pilih Sparepart -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Pilih Sparepart <span class="text-danger">*</span></label>
                                <select name="sparepart_id" class="form-select" required>
                                    <option value="">-- Pilih Sparepart --</option>
                                    <?php foreach($master_sparepart as $ms): ?>
                                        <option value="<?= $ms['id'] ?>"><?= $ms['nama'] ?> - Rp <?= number_format($ms['harga'], 0, ',', '.') ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Info Biaya Servis (Readonly / Tidak Input) -->
                            <div class="col-md-12">
                                <div class="alert alert-info border-0 shadow-sm d-flex align-items-center mb-0">
                                    <i class="bi bi-info-circle-fill me-3 fs-4"></i>
                                    <div>
                                        <strong>Informasi Biaya:</strong> Biaya Servis (Jasa) default adalah <strong>Rp 150.000</strong>. Total biaya akan dihitung otomatis: <em>Harga Sparepart + Biaya Servis Default</em>.
                                    </div>
                                </div>
                            </div>

                            <!-- Keterangan -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Keterangan <span class="text-danger">*</span></label>
                                <textarea name="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan servis (misal: Ganti oli dan perbaikan kampas rem)" required></textarea>
                            </div>

                            <div class="col-md-12 text-end mt-4">
                                <a href="<?= base_url('backend/servis') ?>" class="btn btn-light me-2 px-4 shadow-sm">Batal</a>
                                <button type="submit" class="btn btn-primary px-5 shadow-sm hover-up transition">
                                    <i class="bi bi-save me-2"></i>Simpan Data Servis
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-up { transition: all 0.2s ease-in-out; }
.hover-up:hover { transform: translateY(-2px); }
.transition { transition: all 0.3s ease; }
</style>

<script>
function filterAntrian() {
    var pelangganId = document.getElementById('pelangganSelect').value;
    var antrianSelect = document.getElementById('antrianSelect');
    var options = antrianSelect.options;
    
    // Reset selection
    antrianSelect.selectedIndex = 0;
    
    if (pelangganId === "") {
        antrianSelect.disabled = true;
        for (var i = 1; i < options.length; i++) {
            options[i].style.display = 'none';
        }
        return;
    }

    antrianSelect.disabled = false;
    var hasOption = false;

    for (var i = 1; i < options.length; i++) {
        var option = options[i];
        if (option.getAttribute('data-pelanggan') === pelangganId) {
            option.style.display = '';
            hasOption = true;
        } else {
            option.style.display = 'none';
        }
    }

    if (!hasOption) {
        options[0].text = "-- Tidak ada antrean untuk pelanggan ini --";
    } else {
        options[0].text = "-- Pilih Antrean --";
    }
}
</script>
