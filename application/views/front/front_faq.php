<!DOCTYPE html>
<html lang="en">
<?php echo $view_header;?>

<body id="body">

<?php echo $top_header;?>


<!-- Main Menu Section -->
<?php echo $top_menu;?>

<div class="hero-slider">
 <div class="slider-item th-fullpage hero-area" style="background-image: url(<?php echo base_url('assets/front/images/slider/slider-1.jpg');?>);">
   <div class="container">
     <div class="row">
       <div class="col-lg-8 text-center">
         <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
         <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
         <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href=" ">Shop Now</a>
       </div>
     </div>
   </div>
 </div>
 <div class="slider-item th-fullpage hero-area" style="background-image: url(<?php echo base_url('assets/front/images/slider/slider-3.jpg');?>);">
   <div class="container">
     <div class="row">
       <div class="col-lg-8 text-left">
         <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
         <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
         <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href=" ">Shop Now</a>
       </div>
     </div>
   </div>
 </div>
 <div class="slider-item th-fullpage hero-area" style="background-image: url(<?php echo base_url('assets/front/images/slider/slider-2.jpg');?>);">
   <div class="container">
     <div class="row">
       <div class="col-lg-8 text-right">
         <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
         <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
         <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href=" ">Shop Now</a>
       </div>
     </div>
   </div>
 </div>
</div>

<section>
   <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="title text-left">
                <h2 >Frequently Asked Questions</h2>
                <p>This is a list of Frequently Asked Questions (FAQ) that should help you understand how this Secret Santa works.</p>
                
                <h2>What is Secret Santa?</h2>
                <p>It’s a free online Secret Santa gift exchange organizer! Organize a Secret Santa party with friends, family or even co-workers. Each year around Christmas time people all over the world exchange gifts. To keep things interesting though, you can randomly assign persons to each other to give a present to one another.</p>

                <h2>Can I exclude combinations?</h2>
                <p>It is possible to exclude some combinations, for example to prevent members of the same family having to buy gifts for each other. Excludes can be configured if your party has 4 participants or more and as long as your party is not started. If these conditions are met, you will see a box called 'Exclude certain combinations' on the manage page. Clicking on this box wil open it, and make it possible to edit your excludes. These can be edited at any time, as long as your party isn't started.</p>
                <p>It is not possible to automatically reuse last-year's Secret Santa list and prevent these combinations, as we currently don't see a way to add this without confusing people, sorry.</p>
                
                <h2>Can I provide a wishlist?</h2>
                <p>Participants receive a link to a webpage where they will discover their secret buddy. They can add their own wishlist and see their buddy's wishlist on that page.</p>
                
                <h2>Can I reuse a list?</h2>
                <p>You can reuse last year's list to create a new list this year. Each year we will send out emails containing a link to do this. You can still edit your list before submitting it again. You can also generate an email here, containing all the parties you made during the past 2 years together with a link to reuse them.</p>
                
                <h2>How do I manage my party / participants?</h2>
                <p>The confirmation e-mail sent to the list administrator contains a link to the list's management page.</p>
                
                <h2>Does it work with an odd number of participants?</h2>
                <p>Yes. It doesn't matter if your party consists of an even or an odd number of participants. It is no guarantee that if person A was assigned to person B that person B is also assigned to person A. Secret Santa uses a macro to make sure everybody on the list is assigned to someone else from the list. This works randomly. For example: if John, Caroline and Steve have been added to a party, John can be assigned to Steve, Steve can be assigned to Caroline and Caroline can be assigned to John.</p>
                
                <h2>Is there a limit on the amount of participants?</h2>
                <p>No, there isn't. But, it's a good idea to add them using the CSV option</p>
                
                <h2>I lost my activation mail / url to the party.</h2>
                <p>If you lost your e-mail (which contains the link to the admin page or to the party where you are participating in), fill in your e-mail address on this page and we will send you an overview of all the parties where you are participating in and/or the parties you have created.</p>
                
                <h2>Can I add or remove people?</h2>
                <p>You can add or remove people after creating an event. On the admin page you will find a delete button and a form to add new people. There is only one catch: you can't do this if the admin excluded combinations before submitting the event. Allowing this would mess up the system and people might still be assigned to their excluded buddy, this made us to decide to prevent adding people if excluded combinations are present.</p>
                
                <h2>Can I resend an email?</h2>
                <p>If a participant didn't receive the e-mail for their buddy, the list owner can resend the e-mail for that participant from the management page. You can also change someone's e-mail address from the same page and resend the e-mail.</p>
                <p>If you didn't receive the activation e-mail, check your spam folder. You should receive this email within a few minutes. If you still didn't receive the activation e-mail, you will have to start all over again by creating a new list.</p>
                
                <h2>Can I look into all combinations / wishlists?</h2>
                <p>You can optionally see the combinations and wishlists on the management page. There are buttons for that, you won't see this by default. If you want to share this information with all the participants you will have to share the URL yourself.</p>
                
                <h2>Can I delete my list?</h2>
                <p>Sure you can. Just go to your list management page and use the delete option. All your list data will be permanently removed from our system.</p>
                
                <h2>Who are you?</h2>
                <p>We are a bunch of developers, designers, frontenders, SEO's and marketing people. Secret Santa is one of our side projects. We are sponsored by our employer Intracto digital agency. Our goal is to build a simple, yet very useful Secret Santa organiser. We might also use this for experiments. But the main goal is that we want people to use it, more is better ;-)</p>
                
                <h2>How do you handle my data?</h2>
                <p>Short answer, we are absolutely not interested in your personal data. We use it for nothing whatsoever. Read our privacy policy for an extended answer. Also, at any point in time, you can just delete your Secret Santa account from the admin page.</p>
                
                <h2>Can you add feature X?</h2>
                <p>You have an awesome idea for a feature? We are all volunteers, so if you can't code it yourself you will have to wait until someone that can code wants the same feature. Please create an issue on GitHub that describes your feature or change. For those who can code, we prefer transpiration to inspiration. In other words, we accept your PRs.</p>
                
                <h2>Open source</h2>
                <p>Every bit of this website is open sourced on GitHub. The project is available under a very permissive ISC license. You are welcome to fork the project and, for example, create your own "Secret Panda gift exchange". Or, contribute to this project by opening pull requests (PRs). If you want a change or a whole new feature, just add it.</p>
                
                <h2>What about the ads?</h2>
                <p>We have Google ads here and there to cover some of our expenses. Things like hosting, domain names etc. cost money. We basically do everything for free ourselves and all money we collect goes back to the project. We might use it to buy pizza and drinks for one of our hackdays. Or we might pay professional translators to add more languages to our Secret Santa Organizer. Or it could be something else. By the way, we are still looking for Russian, Indian, Japanese, ... translations. If you can help us with this (for free), please contact us.</p>
                
                <h2>Other questions</h2>
                <p>Any other questions, concerns, or comments? Contact us via the <a href="#"><strong>contact us</strong></a >.</p>
            </div>
            <div class="form-footer" style="margin-top: 32px;">
                <a href="<?php echo base_url('user/group/create');?>"><button type="button" class="btn btn-main btn-block"> Create New Group </button></a>
            </div>
        </div>
        <div class="col-md-2"></div>
   </div>
   
</section>
<!--
Start Call To Action
==================================== -->

<?php echo $view_footer;?>

 </body>
 </html>
