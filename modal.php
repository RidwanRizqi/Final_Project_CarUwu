<!-- Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            if (isset($_POST['ubah'])) {
                $password = $_POST['passSekarang'];
                $password2 = $_POST['passBaru'];
                $password3 = $_POST['passKonf'];
                $id_user = $_SESSION['iduser'];
                $sql = "SELECT * FROM user WHERE id_user='$id_user'";
                $query = mysqli_query($koneksi, $sql);
                if (mysqli_num_rows($query)===1) {
                    $data = mysqli_fetch_array($query);
                    if (password_verify($password, $data['password'])) {
                        if ($password2 === $password3) {
                            $password = password_hash($password2, PASSWORD_DEFAULT);
                            $sql = "UPDATE user
                                    SET password='$password'
                                    WHERE id_user='$id_user'";
                            $query = mysqli_query($koneksi, $sql);
                            if ($query) {
                                echo "<script>alert('Password berhasil diubah!');</script>";
                            } else {
                                echo "<script>alert('Password gagal diubah!');</script>";
                            }
                        } else {
                            echo "<script>alert('Password baru tidak sama!');</script>";
                        }
                    } else {
                        echo "<script>alert('Password sekarang salah!');</script>";
                    }
                }
            }
            ?>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="currentPassword">Password Sekarang</label>
                        <input required type="password" name="passSekarang" class="form-control" id="currentPassword" placeholder="Masukkan password sekarang">
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Password Baru</label>
                        <input required type="password" name="passBaru" class="form-control" id="newPassword" placeholder="Masukkan password baru">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Konfirmasi Password</label>
                        <input required type="password" name="passKonf" class="form-control" id="confirmPassword" placeholder="Konfirmasi password baru">
                    </div>
                    <button type="submit" name="ubah" class="btn btn-primary" id="changePasswordButton">Ubah Password</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });
</script>