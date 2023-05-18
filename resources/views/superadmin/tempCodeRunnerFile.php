<?php
let text = document.getElementById('teks');
    console.log(text);
    //     let text = `Hey is some text some text?

    // You are some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text some text

    // My name is some text some text some text some text some text some text some text some text some text some text some text some text some text some text` //declare variable
    let split = text.split('.'); //split up
    //logging every new line:
    split.forEach(function(item) {
        console.log(i