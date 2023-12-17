<?php include("../inc/top.php"); ?>

<a href="index.php">Trở về danh sách</a>
<h3><?php echo $g["tengiay"]; ?></h3> 
<img src="../../<?php echo $g["hinhanh"]; ?>" width="400" class="img-thumbnail"></a>
<p><strong>Thương hiệu: </strong><br><?php echo $g["tenthuonghieu"]; ?></p>
<p><strong>Danh mục: </strong><br><?php echo $g["tendanhmuc"]; ?></p>
<p><strong>Mô tả: </strong><br><?php echo $g["mota"]; ?></p>
<p><strong>Giá nhập: </strong><?php echo number_format($g["gianhap"]); ?>đ</p>
<p><strong>Giá gốc: </strong><?php echo number_format($g["giagoc"]); ?>đ</p>
<p><strong>Giá bán: </strong><?php echo number_format($g["giaban"]); ?>đ</p>
<p><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $g["id"]; ?>"><i class="align-middle" data-feather="edit"></i> Sửa</a> 
<a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $g["id"]; ?>"><i class="align-middle" data-feather="trash-2"></i> Xóa</a></p>	

<button type="button" class="btn btn-success" onclick="createInput()">+ Thêm số lượng và size giày</button>
<div id="myDiv" class="mb-3 mt-3">
    <script>
        var count=0;
        var div = document.getElementById("myDiv");
        // Create a form and add method, enctype, and action
        var form = document.createElement("form");
        form.method = "post";
        form.enctype = "multipart/form-data";
        form.action = "index.php";
        // Check if the submit button already exists
        if (!document.getElementById("submitButton")) {
            // Create a submit button
            var submitButton = document.createElement("button");
            submitButton.type = "submit";
            submitButton.id = "submitButton";
            submitButton.innerHTML = "Lưu";
            submitButton.className = "btn btn-primary";
            form.appendChild(submitButton);
        }
        // Append the form to the div
        div.appendChild(form);

        function createInput(){
            // hidden input
            var hiddenInput1 = document.createElement("input");
            hiddenInput1.type = "hidden";
            hiddenInput1.name = "action";
            hiddenInput1.value = "xulythemsizesoluong";
            form.appendChild(hiddenInput1);
            // Create a hidden input idGiay
            var hiddenInput2 = document.createElement("input");
            hiddenInput2.type = "hidden";
            hiddenInput2.name = "idGiay"+count;
            hiddenInput2.value = "<?php echo $g['id']; ?>"; // Set value with PHP
            form.appendChild(hiddenInput2);
            // Create another div with class 'mt-3' for the Bootstrap margin
            var space1 = document.createElement("div");
            space1.className = "mt-3";
            form.appendChild(space1);
            // label & input size giày
            var label1 = document.createElement("label");                
            label1.innerHTML = "Nhập size giày: ";
            var input1 = document.createElement("input");
            input1.type = "number";
            input1.name = "txtsize"+count;
            input1.required = true;
            form.appendChild(label1);
            form.appendChild(input1);
            // label & input số lượng của size giày
            var label2 = document.createElement("label");
            label2.innerHTML = "Nhập số lượng: ";
            var input2 = document.createElement("input");
            input2.type = "number";
            input2.name = "txtsoluong"+count;
            input2.required = true;
            form.appendChild(label2);
            form.appendChild(input2);
            // Create another div with class 'mt-3' for the Bootstrap margin
            var space2 = document.createElement("div");
            space2.className = "mt-3";
            form.appendChild(space2);
            count++;
        }
    </script>
</div>

<a href="index.php">Trở về danh sách</a>
<?php include("../inc/bottom.php"); ?>
