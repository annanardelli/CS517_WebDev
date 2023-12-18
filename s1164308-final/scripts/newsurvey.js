function validateTitle(field) {
    return (field == "") ? "Survey Name Required!\n" : ""
}

function validateQuestion(field) {
    return (field == "") ? "Question Text Required!\n" : ""
}

function validate (form) {
    var result = validateTitle(form.name.value)
    if (result == "") return true
    else { alert ("Error:\n" + result); return false }
}

function validateQuestion (form) {
    var result = validateTitle(form.question_text.value)
    if (result == "") return true
    else { alert ("Error:\n" + result); return false }
}