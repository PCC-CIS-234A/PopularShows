$(
    function() {
        function createGenreCombo() {
            let comboBox = $('#genreCombo');
            $.getJSON("assets/actions/fetch_genres.php", data => {
                data.forEach(genre => {
                    let value = genre.genre;
                    comboBox.append(
                        $("<option value='" + value + "'>" + value + "</option>")
                    )
                });
                createTitlesTable();
                comboBox.change(createTitlesTable);
            });
        }

        function createTypeCombo() {
            let comboBox = $('#typeCombo');
            $.getJSON("assets/actions/fetch_title_types.php", data => {
                data.forEach(titleType => {
                    let value = titleType.titleType;
                    comboBox.append(
                        $(`<option value='${value}'>${value}</option>`)
                    );
                })
                createTitlesTable();
                comboBox.change(createTitlesTable);
            });
        }

        function createMinVotesField() {
            $('#minVotesField').on('input', createTitlesTable);
        }

        function createTitlesTable() {
            let titleTable = $("#titleTable tbody");
            let genre = $('#genreCombo').val();
            let titleType = $('#typeCombo').val();
            let minVotes = parseInt($('#minVotesField').val());

            console.log(genre, titleType, minVotes);

            if (genre == null || titleType == null)
                return;
            if (isNaN(minVotes) || minVotes < 1000)
                minVotes = 1000;
            $("#titleTable tbody").html("");
            $.getJSON(`assets/actions/fetch_titles.php?min_votes=${minVotes}&title_type=${titleType}&genre=${genre}`,
                data => {
                    data.forEach(title => {
                        titleTable.append($(`<tr><td class="left">${title.primaryTitle}</td>`
                            + `<td class="center">${title.startYear}</td>`
                            + `<td class="center">${title.averageRating}</td>`
                            + `<td class="center">${title.numVotes}</td></tr>`));
                    });
                }
            );
        }
        
        createGenreCombo();
        createTypeCombo();
        createMinVotesField();
    }
)