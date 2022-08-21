<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/datepicker.css">
    <script src="js/fontawesome.js"></script>
    <link rel="stylesheet" href="css/autocomplete.css">
    <link href="css/site.css" rel="stylesheet" />
    <title>Simple Search</title>
</head>

<body>
    <header class="top">


    </header>
    <section>
        <div id="searchbox" class="card elevated">
            <form id="frm" action="results.php" method="post">
                <div class="searchboxitem dflexc">
                    <i class="fa-solid fa-hotel"></i>
                    <div class="auto-search-wrapper">
                        <input id="destination" class="input-field" type="text" name="destination" placeholder="Destination">
                    </div>
                </div>
                <div class="searchboxitem dflexc">
                    <i class="fa-solid fa-calendar-days"></i>
                    <div id="sandbox"></div>
                </div>
                <div class="searchboxitem dflexc">
                    <i class="fa-solid fa-user"></i>
                    <div class="dflexc">
                        <span>Adults</span>
                        <input type="number" value="1" name="adult" id="adult-input">
                    </div>
                </div>
                <div class="searchboxitem dflexc">
                    <button id="btn" type="submit" class="button filled ripple elevated" style="background-color:var(--link);">
                        <i class="fa-solid fa-magnifying-glass" style="color:white !important;"></i>
                    </button>
                </div>
            </form>
        </div>

        <div>

        </div>
    </section>
    <footer>

    </footer>
    <script src="js/popper.min.js"></script>
    <script src="js/tippy-bundle.umd.min.js"></script>
    <script src="js/datepicker-full.js"></script>
    <script src="js/autocomplete.js"></script>
    <script src="js/site.js"></script>
    <script>
        switchPicker("range");

        tippy("#destination", {
            content: "Destination use only iata codes e.g MEL",
            placement: "top-start",
        });

        tippy("#start", {
            content: "Check in Date",
            placement: "top-start",
        });

        tippy("#end", {
            content: "Check Out Date",
            placement: "top-start",
        });

        tippy("#adult-input", {
            content: "Number of adults",
            placement: "top-start",
        });


        new Autocomplete("destination", {
            onSearch: ({
                currentValue
            }) => {
                // local data
                const data = [{
                        name: "MEM"
                    },
                    {
                        name: "MEL"
                    },
                    {
                        name: "ABQ"
                    },
                    {
                        name: "MPM"
                    },
                ];
                return data
                    .sort((a, b) => a.name.localeCompare(b.name))
                    .filter((element) => {
                        return element.name.match(new RegExp(currentValue, "i"));
                    });
            },

            onResults: ({
                    matches
                }) =>
                matches.map((el) => `<li>${el.name}</li>`).join(""),
        });
    </script>
</body>

</html>