<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Sent By SMTP</title>
</head>
<body>
    <form action="code.php" method="POST" class="form">
        <?php
            if(isset($_SESSION['status'])){
                ?>
                    <div id="myAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong>
                        <?php echo $_SESSION['status'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                unset($_SESSION['status']);
            }
        ?>
        <label>
                <input class="input" type="text" placeholder="" name="fname" maxlength="15" required="">
                <span>First Name</span>
            </label>
            <label>
                <input class="input" type="text" placeholder="" name="lname" maxlength="15" required="">
                <span>Last Name</span>
            </label>
        <label>
            <input class="input" type="email" placeholder="" name="email" maxlength="30" required="">
            <span>Email</span>
        </label>
        <label>
            <input class="input" type="tel" id="phone" placeholder="" name="phone" maxlength="15" required>
        </label>
        <select name="services" id="" class="input service my-2">
            <option value="">Select Services</option>
            <option value="Website Development">Website Development</option>
            <option value="Digital Marketing">Digital Marketing</option>
            <option value="Graphic Designing">Graphic Designing</option>
            <option value="Software Solutions">Software Solutions</option>
        </select>
        <label>
            <textarea class="input" type="text" placeholder="" rows="4" name="message" maxlength="30" required=""></textarea>
            <span>Message</span>
        </label>
        <button type="submit" name="contactBtn" class="submit">Submit</button>
    </form>
</body>

</html>