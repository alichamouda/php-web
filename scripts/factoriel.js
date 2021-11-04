function calculateFactorial(input) {
    if (input < 1) {
        document.getElementById("factorial-input").value= 1;
        document.getElementById("factorial-error").innerText =
            "Il faut que le nombre soit supérieur à 1";
        return;
    }

    document.getElementById("factorial-error").innerText =
    "";

    factorial = 1;
    i = 1;
    for (i=1;i<=input;i++) {
        factorial = factorial * i;
    }
    document.getElementById("factorial-result").innerText = factorial;
}