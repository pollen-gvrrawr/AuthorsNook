<?php
session_start();
require_once "dbaseconn.php";
$id = $_SESSION['id'];
$pfp = $_SESSION['profile'];
$user = $_SESSION['user'];

if(isset($_GET['id'])){
    $book_id = $_GET['id'];
    $selectbooksql = "Select * from tbl_books where book_id=".$book_id;
    $selectbookresult = $conn->query($selectbooksql);
    if($selectbookresult->num_rows > 0){
        foreach($selectbookresult as $fielddata){
?>

<!DOCTYPE html>
<html lang="en" style="height: 100%; overflow: hidden;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $fielddata['title'];?> | book nook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css?v=1">
    <link rel="icon" type="image/png" href="../images/icons/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
</head>
<body style="background-color: #efecf7; height: 100%; overflow: hidden;">
    <div class="position-fixed sidebar z-3" id="sidebar">
        <div class="col z-3" style="position: fixed; padding: 17px 0 0 12px; cursor: pointer;" onclick="sidebarExpand()"><svg  style="transition: stroke 0.4s ease-in;" id="hamburger" class="menu ms-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ad88c6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
        <ul id="sidebarlist" style="position: relative; width: 10vw; top: 12vh; padding-left: 0; list-style-type: none;">
            <li class="sidebar-option"><a href="index.php" class="d-flex align-items-center"><svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#AD88C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a></li>
        </ul>
    </div>
    <div class="container-fluid d-flex flex-column" style="margin-bottom: 2vw;">
        <div class="row navbar text-white z-1" style="position: sticky; top: 0;">
            <div class="col z-3" style="position: sticky; top: 0;"><svg  style="transition: stroke 0.4s ease-in;" id="hamburger" class="menu ms-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
            <div class="col text-center font-bold fs-2 maintitle" onclick="window.location.href='index.php'" style="cursor:pointer;">book nook</div>
            <div class="col d-flex justify-content-end">
                <div class="row d-flex align-items-center" onclick="userDropDown()">
                    <div class="colcust1 text-end poppins-semibold fs-6" style="text-align: center; color: #AD88C6; cursor: pointer"><?php echo $user;?></div>
                    <div class="colcust me-3"><img src="<?php echo $pfp;?>" alt="Profile Picture" class="rounded-circle profile" style="cursor: pointer"></div>
                </div>
            </div>
        </div>
        <div id="userdrop" class="hidepop row bg-white rounded-4 poppins-regular py-3" style="position: fixed; top: 10vh; right: 2vw; width: 12vw; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); z-index: 99">
            <div class="col" style="padding: 0 0 0 0">
                <ul style="margin-bottom: 0; padding-left: 0; list-style-type: none;">
                    <li class="py-2 px-3 pfpoption d-flex align-items-center"><svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>Edit Account</li>
                    <li class="py-2 px-3 pfpoption d-flex align-items-center" onclick="window.location.href='signout.php'"><svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h6v18h-6M10 17l5-5-5-5M13.8 12H3"/></svg>Sign Out</li>
                </ul>
            </div>
        </div>
        <div class="row h-100">
            <div class="booksidemenu d-flex flex-column" id="booksidemenu" style="width: 16vw">
                <button class="collapsebtn pe-2 py-3" id="arrowcollapse" onclick="hideMenu()"><svg class="arrowcollapse" id="arrow" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#7469B6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg></button>
                <div class="row mb-3">
                    <div class="col d-flex justify-content-center">
                        <img src="<?php echo $fielddata['cover']?>" id="preview_img" alt="Book Cover" class="rounded-3 mt-3" style="width: 12vw; height: auto">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4 class="poppins-bold text-center px-4"><?php echo $fielddata['title']?></h4>
                    </div>
                </div>
                <div class="row booksidecontent">
                    <div class="col poppins-regular">
                        <ul class="chapters" id="chapterlist">
                            <hr style="border-top: solid #7469b6 1px">
                            <li class="chapterBox" style="border-right: solid #7469b6 8px;"><a href="bookedit.php?id=<?php echo $fielddata['book_id'] ?>">Book Details</a></li>
                            <hr style="border-top: solid #7469b6 1px" class="mb-3">
                            <form action="" method="post" class="mb-3">
                                <li class="d-flex justify-content-center"><button type="submit" name="newchapter" class="addchapter btn rounded-5 px-3 py-2 d-flex align-items-center" onclick="addChapter()" style="border: none">Add Chapter<svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7469B6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button></li>
                            </form>
                            <?php
                            $selectchaptersql = "SELECT * from tbl_chapters WHERE book_id=$book_id";
                            $selectchapterresult = $conn->query($selectchaptersql);

                            if($selectchapterresult->num_rows > 0){
                                foreach($selectchapterresult as $chapter){
                                    ?><li class="chapterBox"><a href="bookchapter.php?id=<?php echo $chapter['chap_id'] ?>" ><?php echo $chapter['chap_name'] ?></a></li><?php
                            }}
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="poppins-regular py-4 px-5 maineditor" id="maineditor">
                <form id="bookForm" action="bookedit.php?id=<?php echo $fielddata['book_id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col">
                            <h2 class="poppins-bold" style="color: #7469b6">Book Details</h2>
                            <hr style="border-top: solid #7469b6 1px;">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="cover" class="form-label">Book Cover <span class="poppins-light-italic text-muted" style="font-size: 0.75rem;">(leave blank if there are no changes to the current cover)</span></label>
                            <input type="file" name="upload_img" id="cover" class="form-control rounded-3" onchange="previewImage(event)">
                        </div>
                        <div class="col">
                            <label for="uploaded" class="form-label">Date Created</label>
                            <input type="date" name="uploaded" id="uploaded" class="form-control rounded-3" value="<?php echo $fielddata['date_created']?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="title" class="form-label">Title</label>
                            <input spellcheck="false" class="form-control rounded-3" type="text" name="title" id="title" value="<?php echo $fielddata['title']?>">
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col">
                            <label for="desc" class="form-label">Description</label>
                            <textarea spellcheck="false" name="desc" style="resize: none;" id="desc" rows=5 class="form-control rounded-3"><?php echo $fielddata['description']?></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <h2 class="poppins-bold" style="color: #7469b6">Story Notes</h2>
                            <hr style="border-top: solid #7469b6 1px">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label">Character Information</label>
                        <input type="hidden" name="character" id="hiddenCharacter">
                        <div class="col" id="editor1"><?php echo $fielddata['char_info']?></div>
                    </div>
                    <div class="row mb-4">
                        <label class="form-label">Plot Overview</label>
                        <input type="hidden" name="plot" id="hiddenPlot">
                        <div class="col" id="editor2"><?php echo $fielddata['plot_info']?></div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-center gap-2">
                            <input type="submit" value="Save" name="save" class="btn rounded-5 px-5 text-white savebtn">
                            <button class="btn rounded-5 px-4 deletebtn" name="delete">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    
    if(isset($_POST['save'])){
        

        if (!empty($_FILES['upload_img']['name'])) {
            $cover = "../images/cover/" . basename($_FILES['upload_img']['name']);
            move_uploaded_file($_FILES['upload_img']['tmp_name'], $cover);
        } else {
            $cover = $fielddata['cover'];
        }
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $date = $_POST['uploaded'];
        $character = $_POST['character'];
        $plot = $_POST['plot'];

        $updatesql = "UPDATE tbl_books set title='$title',description='$desc',cover='$cover',date_created='$date',char_info='$character',plot_info='$plot' where book_id=$book_id";
        $updateresult = $conn->query($updatesql);

        if($updateresult){
            ?>
            <script>
                Swal.fire({
                    title: "Updated",
                    text: "Book details are saved.",
                    position: "center",
                    icon: "success",
                    confirmButtonColor: "#AD88C6"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'bookedit.php?id=<?php echo $fielddata['book_id'] ?>';
                    }
                });
            </script>
            <?php
        } else {
            echo "Error";
        }
    }

    if(isset($_POST['delete'])){
        $deletesql1 = "DELETE FROM tbl_chapters WHERE book_id=$book_id";
        $deletesql2 = "DELETE FROM tbl_books WHERE book_id=$book_id";
        $deleteresult1 = $conn->query($deletesql1);
        $deleteresult2 = $conn->query($deletesql2);

        if($deleteresult2){
            ?>
            <script>
                Swal.fire({
                    title: "Deleted",
                    text: "This book has been deleted.",
                    position: "center",
                    icon: "success",
                    confirmButtonColor: "#AD88C6"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php';
                    }
                });
            </script>
            <?php
        }
    }

    }}} 
    
    if(isset($_POST['newchapter'])){
        $insertsql = "INSERT into tbl_chapters(book_id,chap_name,content,date_created) VALUES($book_id,'Untitled Chapter',NULL,NOW())";
        $insertresult = $conn->query($insertsql);
        $currentChap = $conn->insert_id;

        if($insertresult){
            ?> <script>window.location.href="bookedit.php?id=<?php echo $book_id ?>";</script> <?php
        }
    }
    
    ?>
    <script>
        const sidebar = document.getElementById("sidebar");
        const menuBtn = document.getElementById("hamburger");
        const list = document.getElementById("sidebarlist");
        function sidebarExpand(){
            const currentWidth = window.getComputedStyle(sidebar).width;
            if(currentWidth == "0px"){
                sidebar.style.width = "20vw";
                menuBtn.style.stroke = "#ffffff";
                list.style.opacity = "1";
                list.style.left = "4vw";
            } else {
                sidebar.style.width = "0vw";
                menuBtn.style.stroke = "#AD88C6";
                list.style.opacity = "0";
                list.style.left = "2vw";
            }
        }
    </script>
    <script>
        const dropdown = document.getElementById("userdrop");
        function userDropDown(){
            if(dropdown.classList.contains("hidepop")){
                dropdown.classList.remove("hidepop");
                dropdown.classList.add("showpop");
            } else {
                dropdown.classList.remove("showpop");
                dropdown.classList.add("hidepop");
            }
        }
    </script>
    <script>
        const storydialog = document.getElementById("newstory");
        function addStory(){
            if(storydialog.classList.contains("hidepop")){
                storydialog.classList.remove("hidepop");
                storydialog.classList.add("showpopstory");
            } else {
                storydialog.classList.remove("showpopstory");
                storydialog.classList.add("hidepop");
            }
        }
    </script>
    <script>
        const editdialog = document.getElementById("editstory");
        function editDialog(){
            if(editdialog.classList.contains("hidepop")){
                editdialog.classList.remove("hidepop");
                editdialog.classList.add("showpopstory");
            } else {
                editdialog.classList.remove("showpopstory");
                editdialog.classList.add("hidepop");
            }
        }
    </script>
    <script>
    function previewImage (event) {
        var displayimg = document.getElementById("preview_img");
        displayimg.src = URL.createObjectURL(event.target.files[0]);
    }
    </script>
    <script>
        document.getElementById("preview_img").addEventListener("click", function() {
        const fileCover = document.getElementById("upload_img");
        fileCover.click();
        });
    </script>
    <script>
        const collapseBtn = document.getElementById("arrowcollapse");
        const arrow = document.getElementById("arrow");
        const bookSideMenu = document.getElementById("booksidemenu");
        const mainEditor = document.getElementById("maineditor");

        function hideMenu() {
            const currentWidth = window.getComputedStyle(bookSideMenu).width;
            const children = document.getElementById("booksidemenu").children;

            if (currentWidth == "0px") {
                bookSideMenu.style.width = "16vw";
                collapseBtn.style.left = "14.5vw";
                arrow.style.rotate = "0deg";
                for (let i = 1; i < children.length; i++) {
                    children[i].style.opacity = "1";
                }
            } else {
                bookSideMenu.style.width = "0vw";
                bookSideMenu.style.minWidth = "0";
                bookSideMenu.style.padding = "0";
                collapseBtn.style.left = "-0.7vw";
                arrow.style.rotate = "180deg";
                for (let i = 1; i < children.length; i++) {
                    children[i].style.opacity = "0";
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const quill1 = new Quill('#editor1', { theme: 'snow' });
            const quill2 = new Quill('#editor2', { theme: 'snow' });

            document.getElementById('bookForm').addEventListener('submit', function () {
                document.getElementById('hiddenCharacter').value = quill1.root.innerHTML;
                document.getElementById('hiddenPlot').value = quill2.root.innerHTML;
            });
        });
    </script>
</body>
</html>