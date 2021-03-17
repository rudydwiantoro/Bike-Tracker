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
    'refresh_token' : 'fe3d8d10b88fdceee13d023212ba15b5478a0501',
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

# activity
header = {'Authorization': 'Bearer ' + access_token}
param = {'per_page': 200, 'page': 1}
my_dataset = requests.get(activites_url, headers=header, params=param).json()
print len(my_dataset)
print(my_dataset[0]["name"])
print(my_dataset[0]["distance"])
print(my_dataset[0]["moving_time"]/60), "Menit"
print(my_dataset[0]["distance"]/1000*60/(my_dataset[0]["moving_time"]/60)) , "km/jam"
