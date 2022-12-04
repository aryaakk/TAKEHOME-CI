<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/styleLibrarian/<?= $style?>.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/headerStyle/style.css">
</head>

<body>
    <section id="content">
        <div class="wrapper-side">
            <div class="sidebar">
                <div class="header-side">
                    <p>LIBPUS</p>
                </div>
                <hr class="row-side">
                <div class="content-side">
                    <ul>
                        <li class="<?= $activeDash ?>"><a href="<?= base_url('Dashboard')?>">Dashboard</a></li>
                        <li class="<?= $activeBook ?>"><a href="<?= base_url('Book')?>">Book</a></li>
                        <li class="<?= $activeBorBook ?>"><a href="<?= base_url('Borrowing')?>">BorrowingBook</a></li>
                        <li class="<?= $activeReturnBook ?>"><a href="<?= base_url('')?>">ReturnBook</a></li>
                        <li class="<?= $activeMembers ?>"><a href="<?= base_url('Members')?>">Members</a></li>
                        <li class="<?= $activeMemTrx ?>"><a href="<?= base_url('')?>">MembersTransaction</a></li>
                        <li class="<?= $activeLibrarian ?>"><a href="<?= base_url('Librarians')?>">Librarians</a></li>  
                        <li class="<?= $activeSubcrip ?>"><a href="<?= base_url('Subcription')?>">Subcriptions</a></li>
                    </ul>
                </div>
                <div class="footer-side">
                    <a href="">Logout&nbsp;&nbsp;<i class="fa-solid fa-right-from-bracket"></i></a>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="header">
                <div class="brand">
                    <div class="head">
                        <span>Pages / <b><?= $title?></b></span>
                    </div>
                    <div class="ket">
                        <span><?= $title?></span>
                    </div>
                </div>
            </div>