<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-3">
    <form action="<?= base_url() ?>" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal" id="tanggal" readonly
                                    value="<?=date('Y-m-d')?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user" class="col-sm-3 col-form-label">Kasir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="user" id="user" readonly
                                    value="<?= session()->get('nama') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pelanggan" class="col-sm-3 col-form-label">Pelanggan</label>
                            <div class="col-sm-9">
                                <select name="pelanggan" id="pelanggan" class="form-control">
                                    <?php foreach (esc($pelanggan) as $data): ?>
                                    <option value="<?= esc($data->id) ?>"><?= esc($data->tipe);?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-outline">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="barcode" class="col-sm-3 col-form-label">Kode Produk</label>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <input type="hidden" id="iditem">
                                    <input type="hidden" id="nama">
                                    <input type="hidden" id="harga">
                                    <input type="hidden" id="stok">
                                    <input type="text" class="form-control" id="barcode" name="barcode"
                                        placeholder="Cari barcode / nama barang" autofocus autocomplete="off">
                                    <span class="text-muted" id="tampil-stok"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="jumlah" id="jumlah" min="1"
                                    placeholder="Masukan jumlah barang">
                            </div>
                            <div class="col-sm-4 pt-3">
                                <button type="button" id="tambah" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- .row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline">
                <div class="p-0 table-responsive">
                    <table class="table table-bordered table-striped" id="tabel-keranjang" width="100%">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Nama Item</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count(esc($pelanggan)) > 0){
                                        $i = 1;
                            ?>
                            <?php foreach(esc($pelanggan) as $p) : ?>
                            <tr></tr>
                            <?php endforeach; ?>
                            <?php } else { ?>
                            <tr>
                                <td colspan="6" class="text-center">tidak ada data</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="sub_total" class="col-sm-5 col-form-label">Sub Total</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control text-right" name="sub_total" id="sub_total" value="0"
                                disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total_akhir" class="col-sm-5 col-form-label">Total Akhir</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control text-right" name="total_akhir" id="total_akhir"
                                value="0" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-outline">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="tunai" class="col-sm-5 col-form-label">Tunai</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control text-right" name="tunai" id="tunai" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kembalian" class="col-sm-5 col-form-label">Kembalian</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control text-right" name="kembalian" id="kembalian" value="0"
                                disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-outline">
                <div class="card-body">
                    <p><button class="btn btn-success" id="bayar"><i class="fa fa-paper-plane"></i> Proses
                            Pembayaran</button></p>
                    <p><button class="btn btn-warning" id="batal"><i class="fa fa-refresh"></i><span
                                class="px-6">Batal</span></button></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/penjualan.js"></script>

<?= $this->endSection() ?>