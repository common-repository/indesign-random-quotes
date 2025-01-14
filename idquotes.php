<?php
/*
Plugin Name: InDesign Random Quotes 
Description: Random popular quotes use shortcode [id_popular_quotes]
Version: 1.0
Author: InDesign Media
Author's URI: https://indesignmedia.net
Plugin URI: https://indesignmedia.net
*/
defined('ABSPATH') or die("Go aways");
define('IDQUOTES_URL', plugin_dir_url(__FILE__));

//ENEQUES STYLES
function idquotes_scripts()
{
    wp_enqueue_style('idquotes-style', IDQUOTES_URL . '/css/style.css');
}
add_action('wp_enqueue_scripts', 'idquotes_scripts');

function idquotes_shortcode()
{
    $quotes = array(
        "When the people fear their government, there is tyranny; when the government fears the people, there is liberty.#Thomas Jefferson",
        "The problem is never how to get new, innovative thoughts into your mind, but how to get old ones out.#Dee Hock",
        "If you're not making mistakes, then you're not doing anything.  I'm positive that a doer makes mistakes.#John Wooden",
        "Vision without action is a daydream. Action without vision is a nightmare.#Japanese saying",
        "Remember your biggest obstacle to success is the absence of execution.#Andrew Young",
        "If you deliberately plan on being less than you are capable of being, then I warn you that you'll be unhappy for the rest of your life.#Abraham Maslow",
        "If you don't quit, and don't cheat, and don't run home when trouble arrives, you can only win.#Shelley Long",
        "Just because you can ... doesn't mean you should.#Anon",
        "Anything unattempted is impossible.#Andrew Young",
        "If you have always done it that way, it is probably wrong.#Charles Kettering",
        "Faced with the choice between changing one's mind and proving that there is no need to do so, almost everybody gets busy on the proof.#John Kenneth Galbraith",
        "If you are not working on your ideas each day, you're working on someone else's.#Marjorie Blanchard",
        "If nothing changes ... nothing changes.#Justin Herald",
        "The best car safety device is a rear-view mirror with a cop in it.#Dudley Moore",
        "Anybody who wants the presidency so much that he'll spend two years organizing and campaigning for it is not to be trusted with the office.#David Broder",
        "From the moment I picked up your book until I laid it down, I was convulsed with laughter. Some day I intend reading it.#Groucho Marx",
        "This is not a novel to be tossed aside lightly. It should be thrown with great force.#Dorothy Parker",
        "No one can make you feel inferior without your consent.#Eleanor Roosevelt",
        "A vacuum is a hell of a lot better than some of the stuff that nature replaces it with.#Tennessee Williams",
        "I don't necessarily agree with everything I say.#Marshall McLuhan",
        "The first step to getting the things you want out of life is this: Decide what you want.#Ben Stein",
        "To err is human, but to really foul things up requires a computer.#Anon",
        "There will be only one of you for all time. Fearlessly be yourself.#Anon",
        "Faith is believing what God said about you, not what you think about yourself.#Robb Thompson",
        "Do your duty in all things. You cannot do more, you should never wish to do less.#General Robert E. Lee",
        "I cannot trust a man to control others who cannot control himself.#General Robert E. Lee",
        "Whiskey - I like it, I always did, and that is the reason I never use it.#General Robert E. Lee",
        "My chief concern is to try to be an humble, earnest Christian.#General Robert E. Lee",
        "Obedience to lawful authority is the foundation of manly character.#General Robert E. Lee",
        "It is well that war is so terrible - lest we should grow too fond of it.#General Robert E. Lee",
        "The education of a man is never completed until he dies.#General Robert E. Lee",
        "You can have anything you want - if you want it badly enough. You can be anything you want to be, have anything you desire, accomplish anything you set out to accomplish - if you will hold to that desire with singleness of purpose.#General Robert E. Lee",
        "Get correct views of life, and learn to see the world in its true light. It will enable you to live pleasantly, to do good, and, when summoned away, to leave without regret.#General Robert E. Lee",
        "Never do a wrong thing to make a friend or keep one.#General Robert E. Lee",
        "You cannot be a true man until you learn to obey.#General Robert E. Lee",
        "My trust is in the mercy and wisdom of a kind Providence, who ordereth all things for our good.#General Robert E. Lee",
        "And in the end it's not the years in your life that count. It's the life in your years.#Abraham Lincoln",
        "Am I not destroying my enemies when I make friends of them?#Abraham Lincoln",
        "Be sure you put your feet in the right place, then stand firm.#Abraham Lincoln",
        "Better to remain silent and be thought a fool than to speak out and remove all doubt.#Abraham Lincoln",
        "He has a right to criticize, who has a heart to help.#Abraham Lincoln",
        "I have always found that mercy bears richer fruits than strict justice.#Abraham Lincoln",
        "I never had a policy; I have just tried to do my very best each and every day.#Abraham Lincoln",
        "I walk slowly, but I never walk backward.#Abraham Lincoln",
        "If this is coffee, please bring me some tea; but if this is tea, please bring me some coffee.#Abraham Lincoln",
        "If we could first know where we are, and whither we are tending, we could then better judge what to do, and how to do it.#Abraham Lincoln",
        "If you look for the bad in people expecting to find it, you surely will.#Abraham Lincoln",
        "Most folks are as happy as they make up their minds to be.#Abraham Lincoln",
        "Nearly all men can stand adversity, but if you want to test a man's character, give him power.#Abraham Lincoln",
        "No man has a good enough memory to be a successful liar.#Abraham Lincoln",
        "No man is good enough to govern another man without that other's consent.#Abraham Lincoln",
        "No matter how much cats fight, there always seem to be plenty of kittens.#Abraham Lincoln",
        "Sir, my concern is not whether God is on our side; my greatest concern is to be on God's side, for God is always right.#Abraham Lincoln",
        "Those who deny freedom to others deserve it not for themselves.#Abraham Lincoln",
        "You can fool all the people some of the time, and some of the people all the time, but you cannot fool all the people all the time.#Abraham Lincoln",
        "You cannot escape the responsibility of tomorrow by evading it today.#Abraham Lincoln",
        "You cannot help men permanently by doing for them what they could and should do for themselves.#Abraham Lincoln",
        "Captain, my religious belief teaches me to feel as safe in battle as in bed. God has fixed the time for my death. I do not concern myself about that, but to be always ready, no matter when it may overtake me.#General Stonewall Jackson",
        "You may be whatever you resolve to be.#General Stonewall Jackson",
        "Never take counsel of your fears.#General Stonewall Jackson",
        "Duty is ours; consequences are God's.#General Stonewall Jackson",
        "If it weren't for Philo T. Farnsworth, inventor of television, we'd still be eating frozen radio dinners.#Johnny Carson",
        "You cannot multiply wealth by dividing it.#Adrian Rogers, 1931",
    );

    $picked = $quotes[rand(0, count($quotes) - 1)];
    $picked_parts = explode('#', $picked);

    echo "<div class='idquotes-warp'>";
    echo '<div class="idquotes-quotes">' . $picked_parts[0] . '</div>';
    echo '<div class="idquotes-donner-name">' . $picked_parts[1] . '</div>';
    echo "</div>";
}

add_shortcode('id_popular_quotes', 'idquotes_shortcode');
