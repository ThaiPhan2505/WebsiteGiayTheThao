<?php include("../inc/top.php"); ?>
<button type="button" class="btn btn-success" onclick="createInput()">+ Thêm chi tiết hỏa đơn</button>
<div id="myDiv" class="mb-3 mt-3">
    <script>
        var count=0;
        var dem = 0;
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
        hiddenInput.name = "idHoaDon";
        hiddenInput.value = "<?php echo $hd; ?>";
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
            hiddenInput1.value = "xulythemchitiethoadon";
            inputDiv.appendChild(hiddenInput1);
            // Create a hidden input idGiay
            var hiddenInput2 = document.createElement("input");
            hiddenInput2.type = "hidden";
            hiddenInput2.name = "idHoadon"+count;
            hiddenInput2.value = "<?php echo $hd; ?>"; // Set value with PHP
            inputDiv.appendChild(hiddenInput2);
            //label stt
            var p = document.createElement("p");   
            var label = document.createElement("label");   
            label.innerHTML = dem = dem + 1;
            p.appendChild(label);
            inputDiv.appendChild(p);
            // label & input giày
            var labelTenGiay = document.createElement("label");                
            labelTenGiay.innerHTML = "Giày: ";
            var inputTenGiay = document.createElement("input");
            inputTenGiay.type = "number";
            inputTenGiay.name = "txtgiay"+count;
            inputTenGiay.required = true;
            inputTenGiay.className = "form-control";
            inputTenGiay.value = "<?php echo $giay['']; ?>";
            inputDiv.appendChild(labelTenGiay);
            inputDiv.appendChild(inputTenGiay);
            // label & input đơn giá
            var label1 = document.createElement("label");                
            label1.innerHTML = "Đơn giá: ";
            var input1 = document.createElement("input");
            input1.type = "number";
            input1.name = "txtdongia"+count;
            input1.required = true;
            input1.className = "form-control";
            inputDiv.appendChild(label1);
            inputDiv.appendChild(input1);
            // label & input số lượng
            var label2 = document.createElement("label");
            label2.innerHTML = "Nhập số lượng: ";
            var input2 = document.createElement("input");
            input2.type = "number";
            input2.name = "txtsoluong"+count;
            input2.required = true;
            input2.className = "form-control";
            inputDiv.appendChild(label2);
            inputDiv.appendChild(input2);
            // label & input size
            var label3 = document.createElement("label");
            label3.innerHTML = "Size: ";
            var input3 = document.createElement("input");
            input3.type = "number";
            input3.name = "txtsize"+count;
            input3.required = true;
            input3.className = "form-control";
            inputDiv.appendChild(label3);
            inputDiv.appendChild(input3);
            // label & input thành tiền
            var label4 = document.createElement("label");
            label4.innerHTML = "Thành tiền: ";
            var input4 = document.createElement("input");
            input4.type = "number";
            input4.name = "txtsoluong"+count;
            input4.required = true;
            input4.className = "form-control";
            input4.readOnly = true;
            inputDiv.appendChild(label4);
            inputDiv.appendChild(input4);
            // Function to calculate thành tiền
            function tinhThanhTien() {
                var dongia = parseFloat(input1.value) || 0;
                var soluong = parseFloat(input2.value) || 0;
                input4.value = dongia * soluong;
            }

            // Add event listeners to input1 and input2
            input1.addEventListener('input', tinhThanhTien);
            input2.addEventListener('input', tinhThanhTien);

            // Call the function to calculate thành tiền initially
            tinhThanhTien();

            // Create a delete button
            var deleteButton = document.createElement("button");
            deleteButton.type = "button";
            deleteButton.innerHTML = "X";
            deleteButton.className = "btn btn-danger";
            deleteButton.onclick = function() {
                inputDiv.remove();
            };
            inputDiv.appendChild(deleteButton);
            count++;
        }
    </script>
</div>
<?php include("../inc/bottom.php"); ?>