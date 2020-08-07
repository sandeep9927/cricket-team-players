function match_fixture() {
    var team_name1 = document.getElementById('teamname1').value;
    var team_name2 = document.getElementById('teamname2').value;
    var venue = document.getElementById('venue1').value;
    console.log(team_name1,team_name2);
    if(team_name1 == "" || team_name2 == "") {
        document.getElementById('teamerror2').innerHTML = "**please choose the team first **";
        return false;
    }else{
        document.getElementById('teamerror2').innerHTML = "";
    }
    if(team_name1 == team_name2) {
        document.getElementById('teamerror2').innerHTML = "**can't choose same team**";
        return false;
    }else{
        document.getElementById('teamerror2').innerHTML = "";
    }
    
    if(venue == ""){
        document.getElementById('venuerror').innerHTML = "**please fill the name **";
        return false;
    }else{
        document.getElementById('venuerror').innerHTML = "";
    }
}