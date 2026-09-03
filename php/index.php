<?php
session_start();
$id = $_SESSION['id'];
$pfp = $_SESSION['profile'];
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | book nook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css?v=1">
    <link rel="icon" type="image/png" href="../images/icons/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body style="overflow-x: hidden;" class="indexscroll">
    <div class="position-fixed sidebar z-3" id="sidebar">
        <div class="col z-3" style="position: fixed; padding: 17px 0 0 12px; cursor: pointer;" onclick="sidebarExpand()"><svg  style="transition: stroke 0.4s ease-in;" id="hamburger" class="menu ms-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#AD88C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
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
        <div class="row">
            <div class="col poppins-medium-italic display-5 d-flex flex-column align-items-center mb-5" style="color: #white; padding: 0; ">
                <img src="../images/others/banner.jpg" alt="home banner" style="width: 100vw; height: auto;" class="bannerhome">
                <p class="position-absolute text-white text-center" style="top: 130px; text-shadow: 2px 2px 1px #7469B6">hi, <?php echo $user;?>! ready to write?</p>
            </div>
        </div>
        <!-- ADD NEW STORY -->
        <div id="newstory" class="hidepop row justify-content-center">
            <div class="col rounded-3 bg-white position-fixed py-5 d-flex align-items-center justify-content-center" style="z-index: 21; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); width: 50vw; top: 15vh;">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <h2 class="font-bold fs-2 text-center" style="color: #AD88C6;">Write a new story</h2>
                    <div class="row">
                        <div class="col-4 d-flex flex-column align-items-center">
                            <img src="../images/others/addcover.png" alt="" id="preview_img" style="width: 13vw; cursor: pointer;" class="rounded-4 p-2">
                            <input class="form-control rounded-5 poppins-regular w-100" type="file" id="upload_img" name="upload_img" accept="image/*" onchange="previewImage(event)">
                        </div>
                        <div class="col-8">
                            <div class="row mt-2">
                                <div class="col">
                                    <label class="form-label poppins-semibold" for="title">Title</label>
                                    <input spellcheck="false" class="form-control poppins-regular" type="text" name="title" id="title" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label class="form-label poppins-semibold" for="desc">Description</label>
                                    <textarea spellcheck="false" class="form-control poppins-regular" name="desc" id="desc" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label class="form-label poppins-semibold" for="date">Date created</label>
                                    <input class="form-control poppins-regular" type="date" name="date" id="date" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col d-flex justify-content-end" style="padding-right: 5px;">
                            <input type="submit" name="create" value="Create" class=" btn poppins-regular text-white rounded-5 createbtn px-4">
                        </div>
                        <div class="col d-flex justify-content-start" style="padding-left: 5px;">
                            <button type="button" class="btn poppins-regular rounded-5 cancelbtn px-4" onclick="addStory()">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col min-vh-100 position-fixed" style="background-color: rgba(0, 0, 0, 0.4); top: 0; z-index: 20;"></div>
        </div>

        <!-- QUICK MENU WITH HOVER -->
        <div class="hideanimation row z-5 d-flex justify-content-center align-self-center rounded-5 bg-white align-items-center position-fixed pe-2 ps-2 z-3" style="width: 21vw; height: 7vh; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);">
            <div class="col d-flex justify-content-center"><svg onclick="addStory()" class="quickicons" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#AD88C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg></div>
            <div class="col d-flex justify-content-center"><svg class="quickicons" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#AD88C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 11.08V8l-6-6H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h6"/><path d="M14 3v5h5M18 21v-6M15 18h6"/></svg></div>
            <div class="col d-flex justify-content-center"><svg class="quickicons" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#AD88C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg></div>
            <div class="col d-flex justify-content-center"><svg class="quickicons" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#AD88C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div>
        </div>
        <div class="row mb-5" style="margin-top: 5vh;">
            <div class="col">
                <h1 class="text-center poppins-medium-italic" style="color: #7469B6;">your works</h1>
            </div>
        </div>
        <?php
        require_once "dbaseconn.php";
        $selectsql = "Select * from tbl_books where user_id=".$id."";

        $selectresult = $conn->query($selectsql);


        if ($selectresult->num_rows > 0) {
        ?>
            <div class="row d-flex justify-content-center mb-4">
                <?php foreach ($selectresult as $index => $fielddata) {
                    $countpartsql = "SELECT COUNT(*) AS total FROM tbl_chapters where book_id=".$fielddata['book_id'];
                    $partresults = $conn->query($countpartsql);
                    if ($partresults) {
                        $field = $partresults->fetch_assoc();
                    ?>
                    <div style="width: 18vw;" name="book-id">
                        <div class="row mb-3">
                            <div class="col d-flex justify-content-center align-items-center bookhover book" style="cursor: pointer;">
                                <img class="rounded-4" style="width: 16vw; height: auto;" src="<?php echo $fielddata['cover'];?>" alt="book cover" onclick="window.location.href='bookedit.php?id=<?php echo $fielddata['book_id'] ?>'">
                                <?php
                                if($fielddata['cover'] == "../images/cover/defaultcover.png"){
                                ?> <h4 class="text-center poppins-semibold text-white position-absolute" style="text-shadow: 2px 2px 1px rgba(0, 0, 0, 0.2); width: 15vw;"><?php echo $fielddata['title'];?></h4>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h3 class="text-center poppins-bold text-dark"><?php echo $fielddata['title'];?></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text-center poppins-regular mb-0" style="padding: 0 0 0 0">Parts: <?php echo $field['total'];?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text-center poppins-regular-italic mb-0" style="padding: 0 0 0 0">Date created: <?php $date = date_create($fielddata['date_created']); echo date_format($date, "M. j, Y");?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                    if(($index+1) % 5 == 0) {
                        echo "</div><div class='row d-flex justify-content-center mb-5 mt-5'>";
                    }     
                } ?>   
            </div>
        <?php
                } else {
                ?>
                <div class="row text-center d-flex flex-column" style="height: 80vh;">
                    <div class="col d-flex justify-content-center">
                        <img class="mt-auto" style="height: 18vh; width: auto;" src="../images/icons/emptyicon.png" alt="cat on a book">
                    </div>
                    <div class="col">
                        <h2 class="poppins-medium-italic mb-auto" style="color: #E1AFD1;">Uh oh. It seems empty here?</h2>
                    </div>
                </div>
                <?php
            }
            ?>    
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if(isset($_POST['create'])){
        if (!empty($_FILES['upload_img']['name'])) {
        $cover = "../images/cover/" . basename($_FILES['upload_img']['name']);
        move_uploaded_file($_FILES['upload_img']['tmp_name'], $cover);
    } else {
        $cover = "../images/cover/defaultcover.png";
    }


        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $date = $_POST['date'];

        $insertquery = "Insert into tbl_books(user_id,title,description,cover,date_created,char_info,plot_info) values($id,'$title','$desc','$cover','$date',NULL,NULL)";
        $insertresult = $conn->query($insertquery);

        if($insertresult){
            ?>
            <script>
                Swal.fire({
                    title: "Book created",
                    text: "Happy writing :)",
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
</body>
</html>