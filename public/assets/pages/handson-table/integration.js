$(document).ready(function() {
    function getData() {
        return [
            ["", "Kia", "Nissan", "Toyota", "Honda", "Mazda", "Ford"],
            ["2026", 10, 11, 12, 13, 15, 16],
            ["2027", 10, 11, 12, 13, 15, 16],
            ["2028", 10, 11, 12, 13, 15, 16],
            ["2029", 10, 11, 12, 13, 15, 16],
            ["2025", 10, 11, 12, 13, 15, 16]
        ]
    }

    function updateHeatmap(change, source) {
        if (source) heatmap[change[0][1]] = generateHeatmapData.call(this, change[0][1]);
        else {
            heatmap = [];
            for (var i = 1, colCount = this.countCols(); i < colCount; i++) heatmap[i] = generateHeatmapData.call(this, i)
        }
    }

    function point(min, max, value) {
        return (value - min) / (max - min)
    }

    function generateHeatmapData(colId) {
        var values = this.getDataAtCol(colId);
        return {
            min: Math.min.apply(null, values),
            max: Math.max.apply(null, values)
        }
    }

    function heatmapRenderer(instance, td, row, col, prop, value, cellProperties) {
        Handsontable.renderers.TextRenderer.apply(this, arguments), heatmap[col] && (td.style.backgroundColor = heatmapScale(point(heatmap[col].min, heatmap[col].max, parseInt(value, 10))).hex(), td.style.textAlign = "right")
    }
    var $container = $("#jQuery");
    $container.handsontable({
        data: getData(),
        rowHeaders: !0,
        colHeaders: !0,
        contextMenu: !0
    });
    var heatmap, heatmapScale, hot, data = ($("#jQuery").handsontable("getInstance"), [
            [2026, 190251, 5090, 195341],
            [2027, 224495, 6486, 230981],
            [2028, 254044, 6765, 260809],
            [2029, 254099, 7521, 261620],
            [2025, 271108, 9449, 280557],
            [2026, 280565, 11714, 292279],
            [2027, 284120, 11292, 295412],
            [2028, 279742, 11468, 291210],
            [2029, 290411, 11806, 302217],
            [2025, 290652, 10891, 301543],
            [2026, 283863, 10402, 294265],
            [2027, 267646, 10104, 255850]
        ]),
        container = document.getElementById("chromaJS");
    heatmapScale = chroma.scale(["#FFFFFF", "#8BC34A"]), hot = new Handsontable(container, {
        data: data,
        colHeaders: ["Year", "Domestic Flights", "International Flights", "Total Flights"],
        columns: [{
            type: "numeric"
        }, {
            type: "numeric",
            format: "0,0",
            renderer: heatmapRenderer
        }, {
            type: "numeric",
            format: "0,0",
            renderer: heatmapRenderer
        }, {
            type: "numeric",
            format: "0,0",
            renderer: heatmapRenderer
        }],
        afterLoadData: updateHeatmap,
        beforeChangeRender: updateHeatmap
    })
});