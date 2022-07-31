var report = {
    risk_not: async (stm) => {
        let frmaction = '../../controller/user/report.php'
        if (stm == 'not') {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: frmaction,
                data: { function: 'not_found' },
                success: (results) => {
                    $("#dash5").html(results.row)
                }
            })
        } else if (stm == 'found') {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: frmaction,
                data: { function: 'is_found' },
                success: (results) => {
                    $("#dash6").html(results.row)
                }
            })
        } else if (stm == 'sick') {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: frmaction,
                data: { function: 'is_sick' },
                success: (results) => {
                    $("#dash7").html(results.row)
                }
            })
        }

    }
}

$(document).ready(function () {
    report.risk_not('not');
    report.risk_not('found');
    report.risk_not('sick');

    setInterval(() => {
        report.risk_not('not');
        report.risk_not('found');
        report.risk_not('sick');
    }, 30000);
})