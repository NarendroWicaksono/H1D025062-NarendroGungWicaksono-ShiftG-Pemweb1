CREATE DATABASE IF NOT EXISTS db_berita CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE db_berita;

CREATE TABLE IF NOT EXISTS posts (
  id INT(11) NOT NULL AUTO_INCREMENT,
  judul VARCHAR(100) NOT NULL,
  konten VARCHAR(1000) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO posts (judul, konten) VALUES
('Starlink is getting daytime data caps',
'Starlink is about to feel a little more like other ISPs, with a new data policy that mimics Anytime Minutes from the bad old days of highly restricted cellphone service. The satellite internet division of SpaceX will start throttling home internet for customers who use more than 1TB of Priority Access data per month during peak hours beginning in December.

Residential customers will now start each monthly billing cycle with an allocation of “Priority Access” data that tracks what you’re using from 7AM in the morning until 11PM at night. If you surpass that 1TB cap, you’ll be moved to “Basic Access” data, or deprioritized data during heavy network congestion, for the rest of your billing cycle.'),

('With Netflix’s ads tier, you never know what you’re going to get',
'Netflix Basic with Ads is finally here, offering a cheaper Netflix subscription at $6.99 per month with the tradeoff that you might have to watch some ads with your movies and TV shows. I spent some time messing around with a new account on the tier on Thursday, and while the experience of using Netflix was mostly the same, what struck me was the unpredictability of how many ads I’d have to watch.

Netflix says you can expect to see an “average of 4 to 5 minutes of ads per hour.” That’s about what I experienced as well, but I was surprised by when the ads might appear. It isn’t like broadcast TV where you knew exactly when and, often, how many ads you’d have to sit through before the show came back.'),

('Elon Musk’s $7.99 Twitter Blue with verification is ‘coming soon’ on iOS',
'The new Twitter Blue subscription isn’t available just yet, though. Esther Crawford, a product manager at Twitter confirmed it’s not live right now but says some users “may see us making updates because we are testing and pushing changes in real-time.”

While the updated app initially showed a revamped notifications screen that defaulted to displaying tweets from Verified users in the first tab, this has since disappeared. As pointed out by one of my colleagues at The Verge and reverse engineer Jane Manchun Wong, the new layout disappears after quitting out of the app and opening it again.');
