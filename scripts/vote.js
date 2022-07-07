const upvoteButtons = document.querySelectorAll(".upvote");
const downvoteButtons = document.querySelectorAll(".downvote");

function toggleVote(ev) {
    let button = ev.currentTarget;
    button.triggered = !button.triggered;

    let [thumb, count] = button.innerText.split(" ");
    count = Number(count);

    if (button.triggered) {
        count += 1;
    } else {
        count -= 1;
    }

    button.innerText = thumb + " " + count;
}

upvoteButtons.forEach(button => {
    button.triggered = false;
    button.addEventListener("click", toggleVote);
});

downvoteButtons.forEach(button => {
    button.triggered = false;
    button.addEventListener("click", toggleVote);
});
