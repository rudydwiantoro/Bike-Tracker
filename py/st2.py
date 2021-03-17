#https://www.strava.com/oauth/authorize?client_id=47280&response_type=code&redirect_uri=http://localhost&approval_prompt=force&scope=activity:read_all


import requests
import urllib3
urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)

auth_url = "https://www.strava.com/oauth/token"
activites_url = "https://www.strava.com/api/v3/athlete/activities"
athlete_url = "https://www.strava.com/api/v3/athlete"

payload = {
    'client_id': "47280",
    'client_secret': '55b55a7b932a15d0c4ef5654b3d610e7093e23d5',
    'refresh_token' : '713b19e28bd731376e8ecb1a94a205cb608a4b4b',
    'grant_type': "refresh_token",
    'f': 'json'
}

print("Requesting Token...\n")
res = requests.post(auth_url, data=payload, verify=False)
#print res.json()
access_token = res.json()['access_token']
print("Access Token = {}\n".format(access_token))

# athlete
header = {'Authorization': 'Bearer ' + access_token}
my_athlete = requests.get(athlete_url, headers=header).json()
print my_athlete

