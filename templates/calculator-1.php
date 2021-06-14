<h2>Калькулятор №1</h2>

<form action="" method="GET">
    <input type="text" name="arg1" value="<?= $arg1 ?>">
    <select name="operation">
        <option value="add" <?php if ($_GET['operation'] == 'add') echo 'selected'; ?>>+</option>
        <option value="sub" <?php if ($_GET['operation'] == 'sub') echo 'selected'; ?>>-</option>
        <option value="multiply" <?php if ($_GET['operation'] == 'multiply') echo 'selected'; ?>>*</option>
        <option value="divide" <?php if ($_GET['operation'] == 'divide') echo 'selected'; ?>>%</option>
    </select>
    <input type="text" name="arg2" value="<?= $arg2 ?>">
    <button type="submit">=</button>
    <input type="text" name="result" readonly value="<?= $result ?>">
</form>