self.addEventListener('push', function (event) {
    var jsonData = event.data.json();

    event.waitUntil(
        self.registration.showNotification(jsonData.title, {
            body: jsonData.body,
            icon: jsonData.icon,
            data: {
                url: jsonData.url
            }
        })
    );
});

self.addEventListener('notificationclick', function (e) {
    e.notification.close();
    var url = e.notification.data.url;

    e.waitUntil(
        clients.matchAll({type: 'window'}).then(cs => {
            for (var client of cs)
                if (client.url === url && 'focus' in client)
                    return client.focus();

            if (clients.openWindow)
                return clients.openWindow(url);
        })
    );

});