<!-- <script>
function searchFocus() {
    if (document.sform.stext.value == 'Nhập từ khóa ...') {
        document.sform.stext.value = '';
    }
}

function searchBlur() {
    if (document.sform.stext.value == '') {
        document.sform.stext.value = 'Nhập từ khóa ...';
    }
}
</script> -->

<div class="box">
    <form method="post" name="sform" action="index.php?page_layout=danhsachtimkiem">
        <input type="text" class="input" name="stext" onmouseout="this.value = ''; this.blur();">
    </form>
    <i class="fas fa-search"></i> 
</div>