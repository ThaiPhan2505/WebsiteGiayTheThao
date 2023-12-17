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
<hr>
<p><strong>Thông tin về size giày và số lượng</p>
<?php 
foreach ($sizeSl as $sl) : 
?>
    <p>
        <strong>Size: </strong><?php echo $sl["size"] . " | "?> 
        <strong>Số lượng: <?php echo $sl["soluong"]?> </strong>
    </p>
<?php 
endforeach; 
?>
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
        // hidden input
        var hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = "idGiay";
        hiddenInput.value = "<?php echo $g['id']; ?>";
        form.appendChild(hiddenInput);
        // Append the form to the div
        div.appendChild(form);

        function createInput(){
            // Create a div for each pair of inputs
            var inputDiv = document.createElement("div");
            inputDiv.id = "inputDiv" + count;
            form.appendChild(inputDiv);
            
            // hidden input
            var hiddenInput1 = document.createElement("input");
            hiddenInput1.type = "hidden";
            hiddenInput1.name = "action";
            hiddenInput1.value = "xulythemsizesoluong";
            inputDiv.appendChild(hiddenInput1);
            // Create a hidden input idGiay
            var hiddenInput2 = document.createElement("input");
            hiddenInput2.type = "hidden";
            hiddenInput2.name = "idGiay"+count;
            hiddenInput2.value = "<?php echo $g['id']; ?>"; // Set value with PHP
            inputDiv.appendChild(hiddenInput2);
            // label & input size giày
            var label1 = document.createElement("label");                
            label1.innerHTML = "Nhập size giày: ";
            var input1 = document.createElement("input");
            input1.type = "number";
            input1.name = "txtsize"+count;
            input1.required = true;
            inputDiv.appendChild(label1);
            inputDiv.appendChild(input1);
            // label & input số lượng của size giày
            var label2 = document.createElement("label");
            label2.innerHTML = "Nhập số lượng: ";
            var input2 = document.createElement("input");
            input2.type = "number";
            input2.name = "txtsoluong"+count;
            input2.required = true;
            input2.className = "ml-3";
            inputDiv.appendChild(label2);
            inputDiv.appendChild(input2);
            // Create a delete button
            var deleteButton = document.createElement("button");
            deleteButton.type = "button";
            deleteButton.innerHTML = "X";
            deleteButton.className = "btn btn-danger ml-3";
            deleteButton.onclick = function() {
                inputDiv.remove();
            };
            inputDiv.appendChild(deleteButton);
            count++;
        }
    </script>
</div>


<a href="index.php">Trở về danh sách</a>
<?php include("../inc/bottom.php"); ?>
