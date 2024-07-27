let locationInfo = '...';

    function fetchLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`)
                        .then(response => response.json())
                        .then(data => {
                            locationInfo = data.address.city || data.address.town || data.address.village || data.address.state || data.address.country || 'Unknown location';
                            updateTicker();
                        })
                        .catch(() => {
                            locationInfo = 'Unable to fetch location';
                            updateTicker();
                        });
                },
                () => {
                    locationInfo = 'Location access denied';
                    updateTicker();
                }
            );
        } else {
            locationInfo = 'Geolocation not supported';
            updateTicker();
        }
    }

    function updateTicker() {
        const tickerContent = document.getElementById('tickerContent');
        const now = new Date();
        const formattedDate = now.toLocaleDateString();
        const formattedTime = now.toLocaleTimeString();
        tickerContent.innerText = `Date: ${formattedDate} | Time: ${formattedTime} | Location: ${locationInfo}`;
    }

    fetchLocation();
    setInterval(updateTicker, 1000);