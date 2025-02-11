<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>look</title>
    <style>
    p {
        font-family: 'Roboto', sans-serif;
    }

    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: #f44336;
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 4px;
    }

    #myBtn:hover {
        background-color: #555;
    }
    </style>
</head>

<body>

    <?php include 'menu.php' ?>

    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/8.jpg" alt="practo" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="images/9.jpg" alt="Chicago" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="images/1.jpg" alt="New York" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="images/16.jpg" alt="New York" width="1100" height="500">
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <section class="my-5">
        <div class="py-5">
            <h2 class="text-center">Articles</h2>
        </div>
        <div class="py-3">
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <img src="images/17.jpg" class="img-fluid aboutimg">
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <h3 class="text-center my-5">Does Teeth Cleaning Damage Teeth?</h3>
                    <h4 class="text-right my-5">-Dr.Rashmi Bamane <br> Dentist </h4>
                    <p>Dear Readers,<br><br>

                        Teeth cleaning (ultrasonic scaling / oral prophylaxis) is a simple, painless, routine procedure
                        with no side effects. This procedure is 100% beneficial and not at all hazardous.<br>

                        Now a days teeth cleaning is done with a vibratory machine called ultrasonic scaler. It just
                        produces 25000 ultrasonic vibrations which gently removes the stains, plaque, calculus and
                        tartar from the superficial layer of teeth. It does not cause any damage as enamel (outermost
                        layer of tooth) is very strong and highly calcified, even more stronger than bone. It's
                        completely safe to do teeth cleaning every 6 months for every individual.<br><br>

                        Professional teeth cleaning is recommended because some areas like Subgingival (beneath the
                        gums), Interdental (between two teeth), lingual and palatal surfaces are not accessible with
                        toothbrush. Ultrasonic teeth cleaning does not cause any sensitivity, shifting or spacing of
                        teeth. Besides, overbrushing or harsh brushing damages the enamel and gums. Use of rough
                        toothbrush and abrasive tooth powder is contraindicated.<br><br>

                        Teeth whitening procedures (Dental Bleaching) may of course lead to tooth sensitivity, gingival
                        irritation and extrinsic tooth discoloration in some cases. Chemicals are involved in teeth
                        whitening making it harmful whereas ultrasonic teeth cleaning only involves some vibrations and
                        water.<br>

                        You cannot remove stains, calculus and tartar with brush. You can only remove plaque which is
                        deposited every 8-12 hours. This is the reason why brushing twice daily is recommended.<br>

                        If teeth cleaning is not done periodically it will result in:<br>
                        1. GINGIVITIS: Mild to moderate inflammation, swelling, bleeding from gums and oral malodor
                        (halitosis/ bad breath).<br>
                        2. RECESSION OF GUMS: Gums start moving away from teeth exposing the cementum (root surface)
                        leading to sensitivity and tooth loosening.<br>
                        3. PERIODONTITIS: Gums are highly inflamed, more swollen and infected by microorganisms.
                        Bleeding is increased along with oral malodor. There is destruction of gums, periodontal
                        ligaments and alveolar bone.<br>
                        4. PATHOLOGIC MIGRATION: Displacement of teeth occurs (especially front teeth) leading to
                        spacing and loosening of teeth. Unfortunately treatment of such diseases do not give excellent
                        results.<br>
                        So my dear readers do not fear while visiting a dentist for teeth cleaning. Its very beneficial.
                        Visit your dentist every 6 months without any fail (you may call it a regular teeth servicing
                        and maintenance appointment).<br>
                    </p>

                </div>
            </div>
        </div>
    </section>


    <section class="my-5">
        <div class="py-3">
        </div>
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-12">
                    <h3 class="text-center my-5">Don't Let Exam Stress Get to You - Here's How to Cope!</h3>
                    <h4 class="text-right my-5">-Dr.Darpan Kaur<br> Psychiatrist </h4>
                    <p>A student’s life can be difficult with rising pressure to perform well in this competitive world!
                        For some , the pressure can be internal from their own self to perform better than rest and for
                        some the perceived pressure can be from external sources such as their family expectations,
                        peers and friends, society and the system to perform academically well! Exams can be an easy
                        ride for some brilliant students who do well with no perceived exam stress, however for a lot of
                        students in the real world preparing for exams and the examination days can be extremely
                        stressful. Many Students get anxious, sad, restless, insomniac, irritable during exams! Exams
                        are a part of the educational system for assessment purpose! One has to prepare well and stay
                        focussed to get good results! These are some simple tips that I have prepared in terms of dos
                        and don'ts for students while handling exam stress! This is not a fully exhaustive list yet I
                        personally believe that it can be of good help to students!</p>
                    <p>Dos:</p>
                    <p>1.Stay positive ! Keep Calm! Believe in yourself! Have positive hope!<br>
                        2.Sleep well! Even during exams, if you can sleep your basic 6 to 8 hours it will be wonderful.
                        Do not stay awake the whole night cramming , it will certainly reduce your performance. No
                        matter how tensed you maybe, try to sleep for few hours at least!<br>
                        3.Prepare a time table, manage your time well, chalk out subjects to be covered over the next
                        few weeks and keep one or two weeks for revision of most essential stuff. Plan and prioritize
                        well. Prepare your own brief revision notes of topics you keep forgetting repeatedly.<br>
                        4.Have a study area which is away from noise, TV, distractions, etc. If you do not have a
                        separate room and if it gets distracting at home, study at your school or college library or
                        wherever you feel it is comfortable! But remember you have to be honest to yourself and don’t
                        waste time wherever you may study!<br>
                        5.Play your regular sports and games. Dance if you like! Sing if you like! Go to the gym if you
                        like ! Keep these activities for brief periods during the day to boost your endorphins when you
                        are in your exam preparatory leave, however do not overdo it !</p>
                    <p>Dont's:</p>
                    <p>1.Don't bring in negative thoughts in your mind! Don't compare yourself to others.<br>
                        2.Don't let your past affect you! Don't waste your time in overthinking and worrying !<br>
                        3.Avoid Last minute new reading. It causes a lot of stress cramming up stuff last minute if it
                        is not studied earlier!<br>
                        4.Do not indulge in drinking too much tea, coffee, stimulants as it will cause sleep disturbance
                        and will make you more jittery and restless.<br>
                        5.Do not overeat before exams. Avoid outside food as far as possible during exams! You certainly
                        don’t want to fall sick on your exam day!</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <img src="images/18.jpg" class="img-fluid aboutimg">
                </div>
            </div>
        </div>
    </section>


    <section class="my-5">
        <div class="py-3">
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <img align="right" src="images/19.jpg" class="img-fluid aboutimg">
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <h3 class="text-center my-5">Killing Your Back Pain Is Easier Than You Think!</h3>
                    <h4 class="text-right my-5">-Dr.Vishwas Virmani(PT)<br>Physiotherapist</h4>
                    <p>Perhaps you have an old injury that you ignored and is now bothering you. Or maybe you slept in
                        an odd position and woke up to feeling really uncomfortable and uneasy. Whatever might be the
                        reason for your back pain, this is one problem that is hard to easily get rid of. However, there
                        are relief therapies to reduce your back pain, which, eventually completely cure your back pain.
                        These are:<br></p>
                    <p><br>Cold therapy
                        <br><br>
                        Even with all the high tech medical options available, a simple ice or cold pack application can
                        still be one of the more effective, proven methods to treat a sore back or neck.<br> Ice is
                        typically most effective if it is applied soon after an injury occurs, or after any activity
                        that causes pain or stiffness.<br>

                        Ice can also be very helpful in alleviating postoperative pain and discomfort. <br>While any
                        form of applying cold to the injured area - such as a bag of ice wrapped in a towel or a
                        commercial ice pack - should be helpful, combining massage therapy with ice application is a
                        nice alternative for pain relief.
                    </p>
                    <p><br>Heat therapy
                        <br><br>
                        While the overall qualities of warmth and heat have long been associated with comfort and
                        relaxation, heat therapy goes a step further and can provide both pain relief and healing
                        benefits for many types of lower back pain.
                        <br>
                        In addition, heat therapy—such as heating pads, heat wraps, hot baths, warm gel packs, etc.—is
                        both inexpensive and easy to do.<br> Some patients find more pain relief with heat (either moist
                        heat or dry heat) and others with ice. You can also try alternating the 2 therapies.
                        <br>
                        Note: If you still do not see any changes in your condition, check with your doctor.
                    </p>

                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="py-3">
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <h3 class="text-center my-5">Limit Your Alcohol Consumption</h3>
                    <h4 class="text-right my-5">-Dr.Vishwas Virmani(PT)<br>Physiotherapist</h4>
                    <p>Conventional wisdom states that the cause of a “beer belly” maybe just that: the alcohol in beer.
                        Recent advertisements for low-carbohydrate beer,however, would like us to believe it is really
                        the calories from carbohydrate and not the alcohol that increases our girth. Although it is true
                        that excess calories cause weight gain, it is also true that alcohol intake can slow fat
                        metabolism.<br><br>In the early 1990s, a group of well-known energy metabolism researchers from
                        Switzerland found that when alcohol was either added to the diet or substituted for other foods,
                        24-hour fat utilization decreased by nearly 33 percent in both cases. Carbohydrate and protein
                        metabolism were not affected.
                        <br><br><br>
                        Energy expenditure was slightly increased (by 7 and 4 percent) but was not elevated enough to
                        offset the effect of alcohol on fat balance. Although the researchers concluded that habitual
                        consumption of ethanol in excess of energy needs favors fat storage and weight gain, the amount
                        of alcohol used in the study (96 grams) was quite a bit higher than one would consume in a
                        five-ounce (145 ml) glass of wine with dinner (16 grams).<br> The effects of just one glass of
                        wine or a microbrew, however,are not known. Nonetheless, other reasons to limit alcohol are that
                        it may promote snacking and reduce your body’s ability to store muscle glycogen.
                    </p>
                    <p><br><br>Try Vinegar
                        <br><br>
                        Research is preliminary, but given that vinegar can enhance the flavor of many vegetables and
                        vegetarian dishes, adding it to your diet may be worth a try. Swedish researchers recently found
                        that consuming vinegar as part of a meal reduces the body’s insulin response to carbohydrate and
                        increases feelings of satiety following that meal. <br>In this study, researchers had volunteers
                        consume three different amounts of vinegar on different days in random order, the highest amount
                        being two to three tablespoons (30-45 ml) along with 50 grams of high glycemic carbohydrate from
                        white bread. <br>The researchers found that the higher the vinegar intake the greater the
                        effects on dose response.

                    </p>

                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <img align="right" src="images/24.jpg" class="img-fluid aboutimg">
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="py-3">
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h3 class="text-center my-5">Comments</h3>
                    <?php 
              include 'conn.php';
              $query = "SELECT * FROM article_comment ORDER BY posting_date DESC";
              $result = mysqli_query($conn, $query);
              while($row = mysqli_fetch_array($result)) {
                echo "<div class='card my-3'>";
                echo "<div class='card-header'><strong>".$row['name']."</strong> | ".$row['email']." <span class='float-right'>".$row['posting_date']."</span></div>";
                echo "<div class='card-body'>".$row['comment']."</div>";
                echo "</div>";
              }
              ?>
                    <h3 class="text-center my-5">Leave a Comment</h3>
                    <div class="w-50 m-auto">
                        <form method="post" action="article_comment.php">
                            <div class="form-group text-center">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group text-center">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group text-center">
                                <label for="comment">Comment:</label>
                                <textarea class="form-control" id="comment" name="comment" rows="5" required></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include 'footer.php' ?>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>

    <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>