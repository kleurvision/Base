-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 22, 2013 at 07:00 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `web_ninja`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_nav`
--

CREATE TABLE `app_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `navigation` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `app_nav`
--

INSERT INTO `app_nav` (`id`, `navigation`) VALUES
(1, '[{"id":1},{"id":2}]'),
(2, '[{"id":2}]'),
(3, '[{"id":2},{"id":3}]'),
(4, '[{"id":2,"children":[{"id":4}]},{"id":3}]'),
(5, '[{"id":2,"children":[{"id":4}]},{"id":5},{"id":3}]'),
(6, '[{"id":2,"children":[{"id":4}]},{"id":5},{"id":6},{"id":3}]'),
(7, '[{"id":2,"children":[{"id":7},{"id":4}]},{"id":5},{"id":6},{"id":3}]'),
(8, '[{"id":2,"children":[{"id":7},{"id":4},{"id":8}]},{"id":5},{"id":6},{"id":3}]'),
(9, '[{"id":2,"children":[{"id":7},{"id":4},{"id":8},{"id":9}]},{"id":5},{"id":6},{"id":3}]'),
(10, '[{"id":1},{"id":2,"children":[{"id":7},{"id":4},{"id":8},{"id":9}]},{"id":5},{"id":6},{"id":3}]'),
(11, '[{"id":2,"children":[{"id":7},{"id":4},{"id":8},{"id":9}]},{"id":5},{"id":6},{"id":3}]'),
(12, '[{"id":2,"children":[{"id":7},{"id":4},{"id":10},{"id":8},{"id":9}]},{"id":5},{"id":6},{"id":3}]'),
(13, '[{"id":2,"children":[{"id":7},{"id":4},{"id":10},{"id":8},{"id":9},{"id":12}]},{"id":5},{"id":6},{"id":3}]'),
(14, '[{"id":2,"children":[{"id":7},{"id":4},{"id":10},{"id":8},{"id":12}]},{"id":5},{"id":6},{"id":3}]'),
(15, '[{"id":2,"children":[{"id":11},{"id":7},{"id":4},{"id":10},{"id":8},{"id":12}]},{"id":5},{"id":6},{"id":3}]'),
(16, '[{"id":2,"children":[{"id":11},{"id":7},{"id":4},{"id":10},{"id":8},{"id":12}]},{"id":5},{"id":6},{"id":3},{"id":6}]'),
(17, '[{"id":2,"children":[{"id":11},{"id":7},{"id":4},{"id":10},{"id":8},{"id":12}]},{"id":5},{"id":6},{"id":3}]');

-- --------------------------------------------------------

--
-- Table structure for table `app_posts`
--

CREATE TABLE `app_posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `app_qrid`
--

CREATE TABLE `app_qrid` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `qrid` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `app_roles`
--

CREATE TABLE `app_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `permissions` int(11) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `app_roles`
--

INSERT INTO `app_roles` (`id`, `permissions`, `name`) VALUES
(0, 0, 'visitor'),
(1, 1, 'user'),
(9, 9, 'admin'),
(10, 10, 'super'),
(2, 2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `app_sites`
--

CREATE TABLE `app_sites` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `layout` enum('fluid','fixed','full') DEFAULT NULL,
  `site_url` varchar(100) DEFAULT NULL,
  `site_name` varchar(100) DEFAULT NULL,
  `app_name` varchar(255) DEFAULT NULL,
  `site_theme` varchar(100) DEFAULT NULL,
  `footer_stick` enum('true','false') DEFAULT NULL,
  `pagetitle` varchar(70) NOT NULL,
  `pagemeta_desc` longtext NOT NULL,
  `pagemeta_keywords` longtext NOT NULL,
  `app_analytics` longtext,
  `site_users` longtext,
  `activation_date` varchar(16) DEFAULT NULL,
  `site_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `app_sites`
--

INSERT INTO `app_sites` (`id`, `layout`, `site_url`, `site_name`, `app_name`, `site_theme`, `footer_stick`, `pagetitle`, `pagemeta_desc`, `pagemeta_keywords`, `app_analytics`, `site_users`, `activation_date`, `site_status`) VALUES
(1, 'fluid', 'http://local.webninja.me/', 'webninja', 'Webninja', 'webninja', 'true', 'Professional Websites Tailored to Your Business', 'Clickity Clank focuses on building elegant graphic design, logo design, and website design solutions for musicians trying to make it in the world', 'design, website development, merchandising, merch, logo, bands, musicians', '<script>\n(function(i,s,o,g,r,a,m){i[''GoogleAnalyticsObject'']=r;i[r]=i[r]||function(){\n(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\nm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\n})(window,document,''script'',''//www.google-analytics.com/analytics.js'',''ga'');\n			\nga(''create'', ''UA-32957664-2'', ''clickityclank.com'');\nga(''send'', ''pageview'');\n</script>', NULL, NULL, NULL),
(2, 'fluid', 'http://sproutdrop.com/', 'sproutdrop', 'Clickity Clank Test', 'default', 'true', 'Test account for Clickity Clank', '', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE `app_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT '0',
  `bio` longtext,
  `phone` varchar(20) DEFAULT NULL,
  `addr1` varchar(100) DEFAULT NULL,
  `addr2` varchar(100) DEFAULT NULL,
  `postal` varchar(10) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `salutation` varchar(100) DEFAULT NULL,
  `facebook` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`id`, `username`, `email`, `password`, `role`, `bio`, `phone`, `addr1`, `addr2`, `postal`, `city`, `province`, `country`, `mobile`, `url`, `fname`, `lname`, `title`, `salutation`, `facebook`) VALUES
(1, 'concierge', 'concierge@kleurvision.com', '2f8f0af94850c0cf3eda398a09a3ab3c', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_user_sessions`
--

CREATE TABLE `app_user_sessions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_session` varchar(100) DEFAULT NULL,
  `session_status` tinyint(4) DEFAULT NULL,
  `session_time_on` varchar(100) DEFAULT NULL,
  `session_time_off` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `app_user_sessions`
--

INSERT INTO `app_user_sessions` (`id`, `user_id`, `user_session`, `session_status`, `session_time_on`, `session_time_off`) VALUES
(1, 1, '86f7e9c427feacc8cbb8e76ecf04b0cc', 0, '130812', NULL),
(2, 1, '86f7e9c427feacc8cbb8e76ecf04b0cc', 0, '130812', NULL),
(3, 1, 'd2782f457a718418bb71d88df40c2989', 0, '130812234205', NULL),
(4, 1, '6398ef29ac6cd1d5f8c52abccb5c9919', 0, '130812234433', NULL),
(5, 1, 'ad6e0b292f2b99fc22c0124f4a6b7798', 0, '130812234746', NULL),
(6, 1, 'be73e59842f7287170b57df8fc86069d', 0, '130812234955', '130812235001'),
(7, 1, '84406dc50477382df209dc70eaa33fe5', 0, '130812235309', '130812235316'),
(8, 1, 'b7a0e96e85462121f383af78821bbb97', 0, '130813221515', NULL),
(9, 1, 'daa7c0a92aeb4b215940ac3bad41b381', 0, '130817023430', NULL),
(10, 1, '0d821209839e5fe2ac167905480af34d', 0, '130822172855', NULL),
(11, 1, '2d64b9b95f71d1584281634b8c2114c6', 0, '130822172906', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_user_social`
--

CREATE TABLE `app_user_social` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `network` varchar(255) DEFAULT NULL,
  `network_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_1_hero`
--

CREATE TABLE `site_1_hero` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `herotitle` longtext,
  `herocontent` longtext,
  `heroimg` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_1_pages`
--

CREATE TABLE `site_1_pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pagename` varchar(50) DEFAULT NULL,
  `pagetitle` varchar(100) DEFAULT NULL,
  `pagecontent` longtext,
  `pageauthor` int(11) DEFAULT NULL,
  `pagemeta_title` varchar(100) NOT NULL,
  `pagemeta_desc` varchar(255) DEFAULT NULL,
  `pagemeta_keywords` varchar(255) DEFAULT NULL,
  `pagetemplate` varchar(100) DEFAULT NULL,
  `pageparent` int(11) DEFAULT NULL,
  `pagedate` int(11) DEFAULT NULL,
  `pagepriority` int(11) DEFAULT NULL,
  `pagechangefreq` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `site_1_pages`
--

INSERT INTO `site_1_pages` (`id`, `pagename`, `pagetitle`, `pagecontent`, `pageauthor`, `pagemeta_title`, `pagemeta_desc`, `pagemeta_keywords`, `pagetemplate`, `pageparent`, `pagedate`, `pagepriority`, `pagechangefreq`) VALUES
(15, 'home-page', 'Home Page', 'This is the home page', 0, 'home-page', 'Home', 'Home', '', NULL, NULL, NULL, NULL),
(16, 'test', 'Test', '', 0, '', '', '', '', NULL, NULL, NULL, NULL),
(17, 'test', 'Test', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_1_settings`
--

CREATE TABLE `site_1_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `navigation` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_2_hero`
--

CREATE TABLE `site_2_hero` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `herotitle` longtext,
  `herocontent` longtext,
  `heroimg` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `site_2_hero`
--

INSERT INTO `site_2_hero` (`id`, `herotitle`, `herocontent`, `heroimg`) VALUES
(3, 'illScarlett', '<p>Uses Clickity Clank</p>', '20130418141206.jpg'),
(4, 'Skratch Bastid', '<p>Uses Clickity Clank</p>', '20130418151635.jpg'),
(5, 'Tupper Ware Remix Party', '<p>Uses Clickity Clank</p>', '20130418152743.jpg'),
(7, 'Cardinal Chase', '<p>Uses Clickity Clank</p>', '20130514170358.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `site_2_pages`
--

CREATE TABLE `site_2_pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pagename` varchar(50) DEFAULT NULL,
  `pagetitle` varchar(100) DEFAULT NULL,
  `pagecontent` longtext,
  `pageauthor` int(11) DEFAULT NULL,
  `pagemeta_title` varchar(100) NOT NULL,
  `pagemeta_desc` varchar(255) DEFAULT NULL,
  `pagemeta_keywords` varchar(255) DEFAULT NULL,
  `pagetemplate` varchar(100) DEFAULT NULL,
  `pageparent` int(11) DEFAULT NULL,
  `pagedate` int(11) DEFAULT NULL,
  `pagepriority` int(11) DEFAULT NULL,
  `pagechangefreq` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `site_2_pages`
--

INSERT INTO `site_2_pages` (`id`, `pagename`, `pagetitle`, `pagecontent`, `pageauthor`, `pagemeta_title`, `pagemeta_desc`, `pagemeta_keywords`, `pagetemplate`, `pageparent`, `pagedate`, `pagepriority`, `pagechangefreq`) VALUES
(1, 'hello', 'Hello', 'Hello World', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'services', 'Services', '', NULL, '', NULL, NULL, 'services', NULL, NULL, NULL, NULL),
(3, 'contact-us', 'Contact Us', '<h3>Clickity Clank HQ</h3>\r\n<p>c/o Kleurvision Inc.<br />180 Mary St. Suite 10<br />Port Perry, Ontario, Canada<br />L9L 1C4</p>\r\n<p><strong id="googlePlace">Phone</strong> +1 (416) 848.7486</p>\r\n<p><strong>Fax</strong> +1 (416) 628.8285</p>\r\n<p><a href="http://goo.gl/maps/8R8dV" target="_blank">Get Directions</a></p>', 0, '', '', '', 'contact', NULL, NULL, NULL, NULL),
(4, 'design', 'Graphic Design', '<h2>While design software tools are available to anyone with a computer, true graphic design talent is the ability to problem solve and deliver unique, engaging visual experiences</h2>\r\n<p>Our business is rooted deeply in graphic design. It&rsquo;s where we got our start. It is the mantra of Clickity Clank to make sure that you look good when broadcasting your image to the world. From album art to poster campaigns, Clickity Clank takes pride in it&rsquo;s award winning design capabilities.</p>', 0, '', '', '', 'services-design', 2, NULL, NULL, NULL),
(5, 'our-work', 'Our Work', '<p>Bast in our glory!... Or just look at the cool stuff we''ve done for some awesome people.</p>', 0, '', '', '', 'portfolio', NULL, NULL, NULL, NULL),
(6, 'about-us', 'About us', '<h2>Our mission is to recreate the connection between music and fans, so that history can repeat itself. It&rsquo;s time to once again look forward to epic stadium shows, line-ups for tickets, and the energetic enthusiasm of new music Tuesday&rsquo;s.</h2>\r\n<p>Clickity Clank is a design and marketing agency dedicated to cleaning up the music industry&rsquo;s visual appearance, without draining the tour budget of bands. Our goal here at Clickity Clank is to educate bands on the importance of branding, proper photography, the value of a well built website and necessary social networking, targeted merchandising, and pretty much all other elements other than the music itself (which is highly important - if it doesn&rsquo;t look good, you''re dead in the water).</p>\r\n<h3>Cool People We''ve Worked With</h3>\r\n<ul class="halfwidth">\r\n<li>Above All Else</li>\r\n<li>Anne Morrone</li>\r\n<li>Attack Media Group</li>\r\n<li>Atticus Clothing</li>\r\n<li>Black Box Recordings</li>\r\n<li>Cardinal Chase</li>\r\n<li>Classified</li>\r\n<li>Crash Parallel</li>\r\n<li>Crush Luther</li>\r\n<li>Danielle Mckee</li>\r\n<li>Futures Past</li>\r\n<li>Girls Love Shoes</li>\r\n<li>Hostage Life</li>\r\n<li>I Book Shows</li>\r\n<li>illScarllett</li>\r\n<li>The Johnstones</li>\r\n<li>Kevin Lyman</li>\r\n<li>â€¨Leah Daniels</li>\r\n<li>The Little Millionairesâ€¨</li>\r\n<li>Living With Lions</li>\r\n<li>The Means</li>\r\n<li>Only Way Back</li>\r\n<li>Paper Lions</li>\r\n<li>Protest the Hero</li>\r\n<li>Ten Second Epic</li>\r\n<li>These Silhouettes</li>\r\n<li>Thraxxx</li>\r\n<li>Tupper Ware Remix Party</li>\r\n<li>Triumph</li>\r\n<li>Shobha</li>\r\n<li>Skratch Bastid</li>\r\n<li>Soul Kiss Entertainment</li>\r\n<li>Sony Music</li>\r\n<li>Sydney</li>\r\n<li>Underground Operations</li>\r\n<li>Universal Music</li>\r\n<li>Ur Artist Network</li>\r\n<li>Vans Warped Tour</li>\r\n<li>Walk off the Earth</li>\r\n</ul>', 0, '', '', '', 'about', NULL, NULL, NULL, NULL),
(7, 'branding', 'Branding', '<h2>First impressions are everything &mdash; on stage and on paper &mdash; your logo design and branding are your primary visual connections to your fans</h2>\r\n<p>The formula for a solid career in music is an algorithm with importance equally given to both talent and marketability. At the root of all marketing solutions is a solid brand. The name of the band, the look of the logo, and the meaning behind it all. Clickity Clank can help direct and build the branding foundation for artists so that they have a head start in the game.</p>', 0, 'Branding and Logo Design for Bands', 'Clickity Clank provides strategic branding and world class logo design to bands around the globe', 'branding, logo design, color selection, visual identity, connection', 'services-branding', 2, NULL, NULL, NULL),
(8, 'website-development', 'Website Development', '<h2>If you want to be taken seriously by your fans, you need to take ownership of your web presence and dominate it by controlling your own space and building your mailing list</h2>\r\n<p>â€¨Get online fast with a <strong>website powered by Clickity Clank</strong> that includes embedded content management, audio management, and a full suite of social integration points to handle your social media needs. Our plugin pack and custom theme development makes it simple to be up and running quick with all of the needs for aspiring and internationally acclaimed artists alike.</p>\r\n<h3>Why you need a website</h3>\r\n<ul>\r\n<li>Your fans think that you already have one &mdash; leaving a huge hole in their hearts when they find out you don''t</li>\r\n<li>You can grant instant gratification for media hungry fans</li>\r\n<li>You can set up and build a global fan base, bigtime</li>\r\n<li>By sending visitors to your own domain, it will validate your band name</li>\r\n<li>Start selling music and merch, as begin distriubting your content on your terms through a <a title="eCommerce development" href="ecommerce" target="_self">fully developed eCommerce</a> solution</li>\r\n</ul>', 0, '', '', '', 'services-website', 2, NULL, NULL, NULL),
(9, 'ecommerce', 'eCommerce', '<h2>The crux of every independent and signed artist alike is the ability to generate enough revenue to fund the next record &mdash; and maybe even eat</h2>\r\n<p>In today&rsquo;s music market, real money is made in merchandising and the music itself has become a marketing tool. In order to capitalize on this premise, establishing a vertically integrated sales model must be top priority. Whether it be a simple store setup, payment processing, custom built eCommerce applications, or off-stage handling, Clickity Clank can provide a tailored solution to fit your online sales needs.</p>\r\n<h3>What we assist with</h3>\r\n<p>Not only will we design, develop and get your store retail ready in an expedious timeline, we can manage the task of operating your environement so that you can get back to making music</p>\r\n<ul>\r\n<li>Inventory management</li>\r\n<li>Order management</li>\r\n<li>Distribution and fulfillment</li>\r\n<li>Payment gateway facilitation</li>\r\n<li>Tour support</li>\r\n</ul>', 0, '', '', '', 'services-website', 2, NULL, NULL, NULL),
(10, 'fan-building', 'Fan Building', '<h2>Nothing is more critical to the success of an artist then fans. So why is it that the management of a fanlist always sits on the backburner?</h2>\r\n<p>We work at digging up fan information, scrubbing the data, building marketing lists, and engaging your fans though communication strategies and public relation techniques. We implement technology strategies to curate fan lists that are highly tagged and usable for continued growth. Though industry partnerships we can offer you the best arsenal with which to wage war in this modern battleground.</p>\r\n<h3>What we focus on</h3>\r\n<ul>\r\n<li>Social media channels</li>\r\n<li>Email marketing campaigns</li>\r\n<li>Live event fan engagement</li>\r\n<li>Data entry</li>\r\n<li>Database maintenance (cleaning)</li>\r\n<li>SMS messaging</li>\r\n</ul>', 0, '', '', '', 'services-fans', 2, NULL, NULL, NULL),
(11, 'print-merchandising', 'Print & Merchandising', '<h2>Sometimes the best way to reach new fans is to hit the street with full colour handbills and wheat paste and get the job done. And sometimes all it takes is a f@#king cool screen print on a t-shirt.</h2>\r\n<p>We work with industry leading providers to ensure that your final product looks it&rsquo;s absolute best and we take the hassle out of shopping around. Our full colour printing production, proofing, and final sign-off all goes through our offices giving you piece of mind knowing that what you are paying for is exactly what you get. That&rsquo;s our guarantee.</p>\r\n<ul>\r\n<li>Promo cards</li>\r\n<li>Business cards</li>\r\n<li>Posters</li>\r\n<li>Flyers</li>\r\n<li>Stickers</li>\r\n<li>Passes &amp; laminates</li>\r\n<li>Packaging</li>\r\n<li>Custom promo items (thumb drives, bottle openers, beer coolies, whatever)</li>\r\n</ul>\r\n<h3>Merch Design &amp; Production</h3>\r\n<p>We devise elegant merch solutions to cater to the most demanding client needs. From design and screen printing to logistics, packing, shipping, and billing - we can build you a custom merchandising solution that fits your needs, and your budget. No longer will your t-shirts and posters have to sit in your drummer&rsquo;s musty basement, or you have to rush a merch order last minute to make sure you have enough for an upcoming tour. Connect with our merchandising department to create your dream scenario.</p>', 0, 'Full Colour Printing and Merch Design & Screen Printing for Bands', 'Clickity Clank offers full colour print products as well as merch management and screen printing for bands', 'screen printing, merch, merchansiding', 'services-print', 2, NULL, NULL, NULL),
(12, 'technology', 'Technology', '<h3>Domain Registration</h3>\r\n<p>Clickity Clank is a licensed registrar and can help you get the domain name of your dreams. Not only can we facilitate the registration and renewals, we can help you decide on what URL would best suit you needs.â€¨</p>\r\n<h3>Hosting</h3>\r\n<p>Clickity Clank offers scalable hosting packages for artists, labels, booking agents, and venues based on monthly usage needs starting at $5/month.â€¨</p>\r\n<h3>File Management</h3>\r\n<p>Face it, moving large files securely across the internet is tedious and a pain in the ass. With our file management system you can upload your entire audio library to share with friends, or fire off your EPK to your entire mailing list with a click of the mouse all from within your own control panel. Each link can be password protected and tracked to see who opened it and when, so that your follow ups can be targeted properly. The best part? Unlimited storage and links that don&rsquo;t expire so you can count on the fact that your files are safe and accessible anytime you need them.â€¨</p>', 0, '', '', '', 'services-tech', 2, NULL, NULL, NULL),
(13, 'print-merchandising', 'Print & Merchandising', 'Full colour print and merch screen printing services', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'partnerships', 'Partnerships', '<h2>We want to work with cool companies. Companies like yours. Are you looking to elevate fan experiences? Heighten the music industry''s sense of design? Expand into new markets? Then we have something in common.</h2>\r\n<p>We are looking for interesting opportunities inside the music industry in the following areas...</p>\r\n<ul>\r\n<li>Events and experiences</li>\r\n<li>Technology and applications</li>\r\n<li>Social media</li>\r\n<li>Brand collaboration</li>\r\n<li>Big data</li>\r\n</ul>\r\n<p><strong>What does a partnership with Clickty Clank look like? </strong>Well, that changes project to project. At the end of the day, we are all about mutually beneficial arrangements that generate revenue and are socially responsible.<strong> We are interested in working with companies that want to do good work.</strong></p>', 0, '', '', '', 'partnerships', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_2_settings`
--

CREATE TABLE `site_2_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `navigation` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `site_2_settings`
--

INSERT INTO `site_2_settings` (`id`, `navigation`) VALUES
(1, '[{"id":2,"children":[{"id":11},{"id":7},{"id":4},{"id":10},{"id":8},{"id":12}]},{"id":5},{"id":6},{"id":3}]');
