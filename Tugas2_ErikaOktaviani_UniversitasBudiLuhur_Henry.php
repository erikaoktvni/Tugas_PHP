<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container px-5 my-5">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label" for="namaPegawai">Nama Pegawai</label>
                <input class="form-control" name="nama" id="namaPegawai" type="text" placeholder="Nama Pegawai" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="namaPegawai:required">Nama Pegawai is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="agama">Agama</label>
                <select class="form-select" name="agama" id="agama" aria-label="Agama">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghuchu">Konghuchu</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Jabatan</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="manager" value="Manager" type="radio" name="jabatan" data-sb-validations="required" />
                    <label class="form-check-label" for="manager">Manager</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="asisten" value="Asisten" type="radio" name="jabatan" data-sb-validations="required" />
                    <label class="form-check-label" for="asisten">Asisten</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="kabag" value="Kabag" type="radio" name="jabatan" data-sb-validations="required" />
                    <label class="form-check-label" for="kabag">Kabag</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="staff" value="Staff" type="radio" name="jabatan" data-sb-validations="required" />
                    <label class="form-check-label" for="staff">Staff</label>
                </div>
                <div class="invalid-feedback" data-sb-feedback="jabatan:required">One option is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Status</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="menikah" value="Menikah" type="radio" name="status" data-sb-validations="required" />
                    <label class="form-check-label" for="menikah">Menikah</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="belumMenikah" value="Belum Menikah" type="radio" name="status" data-sb-validations="required" />
                    <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
                </div>
                <div class="invalid-feedback" data-sb-feedback="status:required">One option is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="jumlahAnak">Jumlah Anak</label>
                <input class="form-control" name="jumlahAnak" id="jumlahAnak" type="text" placeholder="Jumlah Anak" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
            </div>
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    <p>To activate this form, sign up at</p>
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" name="simpan" type="submit">Submit</button>
            </div>
        </form>
        <?php
        if (isset($_POST['simpan'])) {
            $nama = $_POST['nama'];
            $agama = $_POST['agama'];
            $jabatan = $_POST['jabatan'];
            $status = $_POST['status'];
            $anak = $_POST['jumlahAnak'];

            switch ($jabatan) {
                case 'Manager':
                    $gapok = 20000000;
                    break;
                case 'Asisten';
                    $gapok = 15000000;
                    break;
                case 'Kabag';
                    $gapok = 10000000;
                    break;
                case 'Staff';
                    $gapok = 4000000;
                    break;
                default:
                    $gapok = 0;
                    break;
            }

            $tunjab = (20 * $gapok) / 100;

            if ($status == "Menikah" && $anak <= 2) {
                $tunkel = (5 * $gapok) / 100;
            } elseif ($status == "Menikah" && $anak <= 5) {
                $tunkel = (10 * $gapok) / 100;
            } elseif ($status == "Menikah" && $anak > 5) {
                $tunkel = (15 * $gapok) / 100;
            } else {
                $tunkel = 0;
            }

            $gator = $gapok + $tunjab + $tunkel;

            $zakat = ($agama == "Islam" && $gator >= 6000000) ? (2.5 * $gator) / 100 : 0;

            $takeHomePay = $gator - $zakat;

        ?>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table>
                                <tr>
                                    <td>Nama Pegawai</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><?= $nama ?></td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><?= $agama ?></td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><?= $jabatan ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><?= $status ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Anak</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><?= $anak ?></td>
                                </tr>
                                <tr>
                                    <td>Gaji Pokok</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><?= "Rp" . number_format($gapok, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Tunjangan Jabatan</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><?= "Rp" . number_format($tunjab, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Tunjangan Keluarga</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><?= "Rp" . number_format($tunkel, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Zakat Profesi</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><?= "Rp" . number_format($zakat, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Take Home Pay</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><?= "Rp" . number_format($takeHomePay, 2, ',', '.') ?></td>
                                </tr>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        const modal = new bootstrap.Modal('#exampleModal');
        modal.show();
    </script>
</body>

</html>