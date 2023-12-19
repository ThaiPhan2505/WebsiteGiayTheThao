<?php include("../inc/top.php"); ?>

<button type="button" class="btn btn-success" onclick="addFields()">+ Thêm chi tiết hỏa đơn</button>
<div id="formContainer">
    <form id="mainForm" action="index.php" enctype="multipart/form-data" method="post">
        <input type="hidden" name="action" value="xulythemchitiethoadon">
        <!-- Fields will be added here -->
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>

<script>
var fieldCount = 0;

function addFields() {
    fieldCount++;
    var form = document.getElementById('mainForm');

    var fieldSet = document.createElement('fieldset');
    fieldSet.id = 'fieldSet' + fieldCount;
    fieldSet.innerHTML = `
        <input type="hidden" id="idhoadon${fieldCount}" name="idhoadon${fieldCount}" value="<?php echo $_GET['id']; ?>">

        <div class="mb-3 mt-3">
            <label for="optgiay${fieldCount}" class="form-label">Giày</label>
            <select class="form-select" id="optgiay${fieldCount}" name="optgiay${fieldCount}">
                <?php
                foreach($giay as $g):
                ?>
                    <option value="<?php echo $g["id"]; ?>" data-price="<?php echo $g["giaban"]; ?>"><?php echo $g["tengiay"]; ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="giaban${fieldCount}" class="form-label">Giá bán</label>
            <input class="form-control" type="number" id="giaban${fieldCount}" name="giaban${fieldCount}" readonly>
        </div>
        <div class="mb-3 mt-3">
            <label for="txtsoluong${fieldCount}" class="form-label">Số lượng</label>
            <input class="form-control" type="number" id="txtsoluong${fieldCount}" name="txtsoluong${fieldCount}">
        </div>
        <div class="mb-3 mt-3">
            <label for="txtthanhtien${fieldCount}" class="form-label">Thành tiền</label>
            <input class="form-control" type="number" id="txtthanhtien${fieldCount}" name="txtthanhtien${fieldCount}" readonly>
        </div>
        <button type="button" class="btn btn-danger" onclick="removeFields(${fieldCount})">- Xóa chi tiết hỏa đơn</button>
    `;

    form.insertBefore(fieldSet, form.lastElementChild);

    document.getElementById('optgiay' + fieldCount).addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var price = selectedOption.getAttribute('data-price');
        document.getElementById('giaban' + fieldCount).value = price;
        updateTotal();
    });

    document.getElementById('txtsoluong' + fieldCount).addEventListener('input', updateTotal);

    function updateTotal() {
        var price = document.getElementById('giaban' + fieldCount).value;
        var quantity = document.getElementById('txtsoluong' + fieldCount).value;
        document.getElementById('txtthanhtien' + fieldCount).value = price * quantity;
    }
}

function removeFields(fieldCount) {
    var fieldSet = document.getElementById('fieldSet' + fieldCount);
    fieldSet.parentNode.removeChild(fieldSet);
}
</script>

<?php include("../inc/bottom.php"); ?>