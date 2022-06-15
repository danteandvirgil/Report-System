    <footer class="footer col-12">
        <div class="container-fluid">
            <div class="row text-muted">
                <div class="col-6 text-start">
                    <p class="mb-0">
                        <a class="text-muted" href="index.html" target="_blank"><strong>Mopt</strong></a>, All rights reserved ©
                    </p>
                </div>
                <div class="col-6 text-end">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-muted" href="#" target="_blank">Support</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="#" target="_blank">Help Center</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="#" target="_blank">Privacy</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="#" target="_blank">Terms</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </div>
    </div>

    <script src="js/app.js"></script>
    <script>
        function httpPostJson(url, data = null, success = null, loadIn = null) {
            _post(url, JSON.stringify(data), success, loadIn, 'application/json')
        }

        function httpPost(url, data = null, success = null, loadIn = null) {
            _post(url, data, success, loadIn, 'application/x-www-form-urlencoded')
        }

        function _post(url, data = null, success = null, loadIn = null, content_type = 'application/x-www-form-urlencoded') {
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                contentType: content_type,
                beforeSend: function(xhr) {},
                complete: function(xhr, status) {}
            }).done(function(response, status, xhr) {
                if (success !== null) success(response, status, xhr);
            }).fail(function(xhr, status, error) {
                console.log(xhr);
            });
        }

        function loadContent(url, loadIn = null, data = null, success = null, clearLoadInContent = true) {
            let defaultData = {};

            if (data !== null) $.extend(defaultData, data);

            $.ajax({
                url: url,
                type: "GET",
                data: defaultData,
                contentType: 'application/x-www-form-urlencoded',
                beforeSend: function(xhr) {
                    if (loadIn !== null) {
                        if (clearLoadInContent) $(loadIn).html('');
                    }
                },
                complete: function(xhr, status) {}
            }).done(function(response, status, xhr) {
                if (loadIn !== null) $(loadIn).html(response);
                if (success !== null) success(response, status);
            }).fail(function(xhr, status, error) {
                console.log(xhr, status, error);
            });
        }
    </script>
    </body>

    </html>