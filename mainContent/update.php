<div class="container " style="min-height:600px;">
    <?php
    $uid=$_SESSION['slno'];
?>


    <div class="card m-3">
        <div class="card-header">
            Welcome message
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <?php
                    $sql = "SELECT * FROM `message` where id = 1";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){ 
                        echo '<p class="fw-bolder fs-2">'.$row['name'].'...</p>';
                        // echo '<footer class="blockquote-footer">'.$row['description'].'</footer>';
                        echo '<p >'.$row['description'].'</p>';
                    }
                ?>
        </div>
    </div>

    <!-- <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Accordion Item #1
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse
                    plugin adds the appropriate classes that we use to style each element. These classes control the
                    overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                    this with custom CSS or overriding our default variables. It's also worth noting that just about any
                    HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div> -->
        <div class="container ">
<h3 class="p-3">Updates</h3>
        <?php
            $sql = "SELECT 
                        u.id AS user_id,
                        u.first_name,
                        u.last_name,
                        u.email,
                        m.name AS message_name,
                        m.description AS message_description,
                        DATE_FORMAT(m.datestamp, '%Y-%m-%d') AS formatted_message_date
                    FROM 
                        users u
                    JOIN 
                        message m ON m.datestamp > u.datestamp
                    WHERE 
                        u.id = $uid
                        AND m.id != 1
                    ORDER BY 
                        m.datestamp DESC;";
            $result = mysqli_query($conn, $sql);
            $sno = 0;
            while($row = mysqli_fetch_assoc($result)){ 
                echo '<div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#a'.$sno.'"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    '.$row['message_name'].'
                                </button>
                            </h2>
                            <div id="a'.$sno.'" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                '.$row['message_description'].'
                                </div>
                            </div>
                        </div>';
                        $sno = $sno + 1;
            }
        ?>
        </div>


    </div>