<?php global $tp_options; ?>
<footer itemscope itemtype="http://schema.org/LocalBusiness">
                <address>
                    <p>
                        <a href="/en/about-us/location-zurich" data-rit-tabid="135">
                            <span><?php echo $tp_options['contact-address1']; ?> | </span>
                            <span><?php echo $tp_options['contact-address2']; ?> | </span>
                            <span><?php echo $tp_options['contact-address3']; ?></span> 
                        </a>
                    </p>
                    <p class="contactInfo">
                        <span>Fon</span>
                        <a href="tel:<?php echo $tp_options['contact-phone-number']; ?>" itemprop="telephone"><?php echo $tp_options['contact-phone-number']; ?></a> 
                        <span>Fax</span>
                        <a href="tel:<?php echo $tp_options['contact-fax']; ?>"><?php echo $tp_options['contact-fax']; ?></a> 
                        <a href="mailto:<?php echo $tp_options['contact-email']; ?>"><?php echo $tp_options['contact-email']; ?></a>
                    </p>
                </address>
            </footer>
        </section>
        <footer data-rit-rwd-hide="mobile">
            <div id="dnn_ctl06_DisallowedLoginPlaceholder">&nbsp;</div>
            <small>Web by Realize IT GmbH</small>
        </footer>
    </form>
</body>
</html>