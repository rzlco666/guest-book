<?php
//Inisialisasi nilai variabel awal
$jumlah = null;
$bln_laporan = "";
foreach ($grafik_penjualan as $item) {
    $jum = $item->total;
    $jumlah .= "$jum" . ", ";

    $jur = $item->bulan;
	$bln_laporan .= "'$jur'" . ", ";
}
?>


<script type="text/javascript">
    $(function() {
        $('[data-plugin="knob"]').knob()
    });
    var options = {
        chart: {
            height: 350,
            type: "area",
            toolbar: {
                show: !1
            }
        },
        colors: ["#3051d3", "#e4cc37"],
        dataLabels: {
            enabled: !1
        },
        series: [{
            name: "2021",
            data: [<?php echo $jumlah; ?>]
        }, ],
        grid: {
            yaxis: {
                lines: {
                    show: !1
                }
            }
        },
        stroke: {
            width: 3,
            curve: "smooth"
        },
        markers: {
            size: 0
        },
        xaxis: {
            categories: [<?php echo $bln_laporan; ?>],
            title: {
                text: "Bulan-Tahun"
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: .7,
                opacityTo: .9,
                stops: [0, 90, 100]
            }
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
            floating: !0,
            offsetY: -25,
            offsetX: -5
        }
    };
    (chart = new ApexCharts(document.querySelector("#tahunan-sale-chart"), options)).render();
</script>