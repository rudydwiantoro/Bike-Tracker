curl -X POST https://api.strava.com/api/v3/push_subscriptions \
      -F client_id=47280 \
      -F client_secret=55b55a7b932a15d0c4ef5654b3d610e7093e23d5 \
      -F 'callback_url=http://balioffice.net/st/redirect_strava.php' \
      -F 'verify_token=BOFFICE-STRAVA'