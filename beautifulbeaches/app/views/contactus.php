<!DOCTYPE html>
<html lang="en">
<body class="contact-body">
    <div class="contact-container">
        <div class="row-gallery">
            <div class="col-md-8">
                <div class="social-network">
                    <h4 class="social-network-title">BE THE FIRST TO HEAR ABOUT OUR NEW LISTS</h4>
                    <ul class="social-network-list">
                        <li class="social-network-item"><a href="https://www.facebook.com/"><img src="https://worlds50beaches.com/assets/images/fb.svg" alt="Facebook"></a></li>
                        <li class="social-network-item"><a href="https://x.com/?lang=vi"><img src="https://cdn-icons-png.flaticon.com/256/5969/5969020.png" alt="Twitter"></a></li>
                        <li class="social-network-item"><a href="https://www.youtube.com"><img src="https://worlds50beaches.com/assets/images/yt.svg" alt="YouTube"></a></li>
                        <li class="social-network-item"><a href="https://www.pinterest.com/"><img src="https://i.pinimg.com/564x/55/d7/43/55d743c6814aa4f775632ba00ce6228a.jpg" alt="Pinterest"></a></li>
                        <li class="social-network-item"><a href="https://www.skype.com/en/"><img src="https://worlds50beaches.com/assets/images/tw.svg" alt="Skype"></a></li>
                        <li class="social-network-item"><a href="https://www.instagram.com/"><img src="https://worlds50beaches.com/assets/images/inst.svg" alt="IG"></a></li>
                    </ul>
                </div>
                <form method="POST" action="http://localhost/beautifulbeaches/contactus/savecontact" class="contact-form">
                    <div class="form-group">
                        <label for="name" class="contact-label">Name *</label>
                        <input class="border3" type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="contact-label">Email *</label>
                        <input class="border3" type="email" id="email" name="email"  required>
                    </div>
                    <div class="form-group">
                        <label for="message" class="contact-label">Message *</label>
                        <textarea class="border3" id="message" name="message" rows="5"  required></textarea>
                    </div>
                    <button type="submit" class="contact-btn">Submit</button>
                </form>
            </div>
            <div class="col-md-4">
                <div class="map">
                    <h4 class="map-title">Our Map</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.096949073242!2d105.77971427471442!3d21.02880648777807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b32b842a37%3A0xe91a56573e7f9a11!2zOGEgVMO0biBUaOG6pXQgVGh1eeG6v3QsIE3hu7kgxJDDrG5oLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSAxMDAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1720507570689!5m2!1svi!2s" 
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="contact-information">
                    <h4 class="contact-info-title">CONTACT INFORMATION</h4>
                    <div class="contact-background">
                        <p style="margin:0;"><span style="font-weight:bold;">HaNoi,</span>8A Ton That Thuyet, My Dinh</p>
                        <p style="margin:0;">Call: 0869171498</p>
                        <p style="margin:0;">Email: hndcmm245@gmail.com</p>
                    </div>
                    <div class="contact-background">
                        <p style="margin:0;"><span style="font-weight:bold;">HaNoi,</span>8A Ton That Thuyet, My Dinh</p>
                        <p style="margin:0;">Call: 0869171498</p>
                        <p style="margin:0;">Email: hndcmm245@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="bannerad">
        <button type="x" class="ad button" onclick="closebannerad()">x</button>

        <a href="https://www.vemaybay.vn/">
            <img src="https://img.pikbest.com/origin/06/01/50/24xpIkbEsT4Rf.jpg!f305cw" alt="Banner Ad"></a>
    </div>
    <script src="http://localhost/beautifulbeaches/app/asset/contactus.js"></script>
</body>
</html>
