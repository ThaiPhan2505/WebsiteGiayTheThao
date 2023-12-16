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
        function createInput(){
            var div = document.getElementById("myDiv");
            var form = document.createElement("form");
            var container = document.createElement("div");

            div.appendChild(container);

            // Check if the submit button already exists
            if (!document.getElementById("submitButton")) {
                // Create a submit button
                var submitButton = document.createElement("button");
                submitButton.type = "submit";
                submitButton.id = "submitButton";
                submitButton.innerHTML = "Lưu";
                submitButton.className = "btn btn-primary";
                div.appendChild(submitButton);
            }

            var space1 = document.createElement("div");
            space1.className = "mt-3";
            div.appendChild(space1);

            var label1 = document.createElement("label");                
            label1.innerHTML = "Nhập size giày: ";
            var input1 = document.createElement("input");
            input1.type = "number";
            input1.name = "txtsize"
            div.appendChild(label1);
            div.appendChild(input1);

            var label2 = document.createElement("label");
            label2.innerHTML = "Nhập số lượng: ";
            var input2 = document.createElement("input");
            input2.type = "number";
            input2.name = "txtsoluong"
            div.appendChild(label2);
            div.appendChild(input2);

            // Create another div with class 'mt-3' for the Bootstrap margin
            var space2 = document.createElement("div");
            space2.className = "mt-3";
            div.appendChild(space2);
            div.appendChild(form);
        }
    </script>
</div>
<a href="index.php">Trở về danh sách</a>
<?php include("../inc/bottom.php"); ?>
