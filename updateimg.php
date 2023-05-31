<?php 
    include('partial/header.php'); 
?>



    <style>
        .center {
            height:100%;
            display:flex;
            align-items:center;
            justify-content:center;

        }
        .form-input {
            width:350px;
            padding:20px;
            background:#fff;
            box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
                        3px 3px 7px rgba(94, 104, 121, 0.377);
        }

        .form-input img {
            width:100%;
            display:none;
            margin-bottom:30px;
        }

        .form-input input {
            display:none;
        }

        .form-input label {
            display:block;
            width:45%;
            height:45px;
            margin-left: 25%;
            line-height:50px;
            text-align:center;
            background:#1172c2;
            color:#fff;
            font-size:11px;
            font-family:"Open Sans",sans-serif;
            text-transform:Uppercase;
            font-weight:600;
            border-radius:5px;
            cursor:pointer;
        }

    </style>

<br><br><br><br>
<!-- <div class="center">
    <input type="number" placeholder="Input Barcode Number">

<br><br>
    <div class="form-input">
        <div class="preview">
            <img id="file-ip-2-preview">
        </div>

        <label for="file-ip-1">Upload Image</label>
        <input type="file" name="image" id="file-ip-1" accept="image/*" onchange="showUpdatedPic(event);">
        
    </div>
</div> -->

<?php
    if(isset($_SESSION['upimage']))
    {
        echo $_SESSION['upimage'];
        unset($_SESSION['upimage']);
    }
?>

<div class="center">


    <form action="imgdata.php" method="post" enctype="multipart/form-data">
    
        <label for="code">Barcode</label>
        <input type="text" name="code" placeholder="Enter Barcode" onkeyup="showOldImg(this.value)" required>
        <br><br>
        <span id="imgdata"></span>
        <br>
            <div class="center" id="hidebutton" style="display:none">
                <div class="form-input">
                    
                    <div class="preview">
                        <img id="file-ip-2-preview">
                        
                    </div>

                    <label for="file-ip-1">Replace Image</label>
                    <input type="file" name="image" id="file-ip-1" accept="image/*" onchange="showUpdatedPic(event);">
                    
                </div>
            </div>
        <br><br>
            <div style="text-align:center;"><input type="submit" name="updateimg" class="button" value="Update"></div>

    </form>
</div>




<script>
    // image preview
        function showUpdatedPic(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-2-preview");
                preview.src = src;
                preview.style.display = "block";

                document.getElementById('imgdata').style.display = "none"
            }
        }
    // image preview

    // image data
        function showOldImg(img) {
            if (img.length == 0) {
                document.getElementById("imgdata").innerHTML = "";
                document.getElementById('hidebutton').style.display = "none"
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("imgdata").innerHTML = this.responseText;
                    document.getElementById('hidebutton').style.display = "block"
                }
                };
                xmlhttp.open("GET", "imgdata.php?img=" + img, true);
                xmlhttp.send();
            }
        }
    // image data
</script>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('partial/footer.php'); ?>