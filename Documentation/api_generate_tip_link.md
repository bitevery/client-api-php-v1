# Generate　Tip　Link Endpoint Instruction
This version of endpoint supports dynamic tip link creation for up to 2 receivers in html formats

## Input Parameter
* icon_id (required): specify icon style provide by bitevery. currently 6 styles are provided.
	* icon_id 1. ![TIP_ICON1](image/tip_icon_1.png)
	* icon_id 2. ![TIP_ICON2](image/tip_icon_2.png)
	* icon_id 3. ![TIP_ICON3](image/tip_icon_3.png)
	* icon_id 4. ![TIP_ICON4](image/tip_icon_4.png)
	* icon_id 5. ![TIP_ICON5](image/tip_icon_5.png)
	* icon_id 6. ![TIP_ICON6](image/tip_icon_6.png)
* height (required): height of tip icon, in pixel
* creator_email (required): email account of the tip link creator.
* creator_api_access_code (required): api access code of the tip link creator.
* email_1 (required): email address for first tip recipient
* nickname_1 (required): nick name for first tip recipient, which will show up on tip confirmation page.
* dist_1 (optional): in percentage, all tip will go to first tip recipient if this parameter is not specified.
* email_2 (optional): email address for second tip recipient
* nickname_2 (optional): nick name for second tip recipient, which will show up on tip confirmation page.
* dist_2 (optional): in percentage, if the first tip receiver only gets less than 100% of tip ammount, second recipient will get the rest.
  * the sum of all percentage must be 100.

## Output Return
A string of tip link in html format. 

## Security
Accounts information(email, access_code) provided in argument will be encrypted using BitEvery public key and therefore won't be visible by third party.

## Implementation Steps
1. enable OpenSSL on PHP.  --> in php.ini set extension=php_openssl.dll
2. Request API access and get API Access code by login BitEvery --> Setting -->API Setting.
2. include script in html head. -->  <script src="https://www.bitevery.com/be-js/tip_button.js"></script>
3. call api follow examples below.

## example
### Single Receiver
``` php
  require_once 'create_tip_link';
  echo create_tip_link($icon_id,$height,$creator_email,$creator_api_access_code, $email_1,$nickname_1);
```
```
>>> <div id="bitEveryTip3d123"></div><script>api_tip_btn_setup("3d123",1,20,"q8ihxxHwQrtEVOgvgR4yG8WVJh8oG4Qx/qaH9SuWW2UD2A6vSN+K7PUF3vJu05szsMtbG4IGNmmVr74AEIicGmb5fzbmmTJOhgf9+9K36uJKrku3klGD8iQX6eM7a6W3L7Ng9ykoYLyW/V1B/tfUo1T7V/LZIW97aZDG9kpBTkMCU2RZ93f1nvGxTI7QBV6Tm2Ivd2REJBPAExbzKPAFjOOZPW4s9ASY1Agh1oi9kpID0PMEMncPCWwQ+hhvas74wWadA6OFk4OKPUiRKR+6mahQxGKVMxg1JsWQgdXoYgB4L6TQPUeTfmyQTcRj4niForuQSJ/Igt7je7ZWJO4HFA==","qAbdjKmrxy6WtPwpU07CruJW6QwCBh+2sdu9v5A4b5W393lv9Z2XXblonF4e+Ea57Ct0OAN4SS9Low9qVCOmo54HVoHgzwhxyuzFNkwbYNygYJcUnS7NS60uvd4RY8U5Lu7+Jwa/kf0nOeahjPMkFxJgKWSLtMXufpR7L9IcRUoceMWRyavlCTMW1R+rzVJ78hLVmEQz7rLjGdyA6BRj2uzbTaFE0hFuRvThUaP5VFjIRfuMO83uUJIcor8dHNYXCIg8ap2Euvm9LT2pzGfifQGxIoBYmyxo/d7HRR69kFSiowHwAHZDqTfCS1qxgQQJ0aI8OS9OsMlR5+IylEGaig==","dUebvRqmnn9p6W50p/pV1mNsvzoztFiBKlyfxQ71HsyLE7MWyOGOzAfOsgwJl9uiSWWcxdKoxJLPzeQZn86fLGCaCo6rwB2NW5Fjr8iVYf40rVhbUGD1F09lbpg6xDinF83JxO7XeaRDSqqAUKFTWt2ELLg8gktyHqMa6BJGfezk0D6QxvwslK2M/pQbsyVxXI/ELT6IWrc1b+PY0BmaPCFTwoU+5bqvOag2xLze0JwK0Mg4q8OMjSgHuWyfF6lgwbncoYoIBTaAJ1PFLe0QHTkbVjCmOp7pFgGEAxNFATds/3cucFukaBN8LGlLuivI3TmLUkaqCwUCeV3JhpSisw==","apple",100,"VZnfV3UA/MXv9NhY10Mck+78SY8sCUdHmUagwYIwagTHHB65afyYD+i4mCUYLH3dj8vhAULd1GKq5jF1FqHEJxmOZA1qq9DG6tUISrpu2KSZSggzo0UY0C0XBIrIXBB9N5Xa0L7042bI+9vEx5/GnmZKmdI9A8umb0qE2wBWplDGuJWpM23J8JF5j92s++h6gxyBe7o02XnLC9QkSJVxxrlaKS0Y3eet2OVtAhQa6G7dOimNM857BWwnJzxqHkNykRM6enYa4wxoJzWkhKXxziRp8sDiDuZldQJNr0rHJ1ZrLPlhb7cnsjgokA7dS7zCJKp7RJl7DJeKYwstgLJEWA==","",0);</script>
```


#### Two Receiver
``` php
  require_once 'create_tip_link';
  echo create_tip_link($icon_id,$height,$creator_email,$creator_api_access_code, $email_1,$nickname_1,$dist_1,$email_2,$nickname_2,$dist_2);
```
```
>>> <div id="bitEveryTip38d71"></div><script>api_tip_btn_setup("38d71",1,20,"pwRYVLh0+0ma/AN4WR+sfhxbgL5DmUjvEU7P0YVYSSKKUKIbGHwZjFiclP2bavCZt+cWIlfYZaKHpGZeV17lhw2GwjnXnvZNWj7sx7B4IX0DdXsfzaIpnI18UXl2etXpxEypvx+v9fexUG1qgak/7sFe+cTLJmaiV02C5/v80G6C6W7hkWJsvK2XCVvXZxGdw/QPDfDmhBdX7iKhItIeziuSCS8zYHjtMGKl1XDO+KZY+Igr0gD2EoWaHi60Wd9Fqk6om/alGQfqK3Y8a6oLAzRmu1+7yc/6gmOrQBquNeMGqEK2rdtTsyTVj1vH7Ecf13qqMOoGhFMofeDJub72Rw==","nUbXxq/sLURMut4Ad4uJrjvRNG6411yBHmpNeH9WvKTcenX5kPI3zfFAVsbhjh/222ukiF9k7xtwkbmAcYvc5jkOiHyCYAGfAnFiYXVuSDszS0WBXvSzDA9Mg7YwfR4Az/nzb+3tBj6kpHF5wd7UBiFOF2EEsAHZeOdGo2uSPUCr3Vv3xdFMEQgwuB0hrYsTuerRm/d11dt/UzCT1W6SE8JSjek/h0jR9iV2cf07G0jVWl/fCDqRFV7CsH5VCDdFSyczC6OFMNYWJ2ljOQCkTN5j9fkNLvuOkCKERkG3A+me6NOhH1iK230lmh8qxz6grFaqLW3GIO3uFGXbVE4aFw==","sfC3dGU+K6nTOzN/S8NeaDpYzOEgJnYJmMQFznRkSlHAgGR1DCy7ODv158c8yDOCrDvOQQlYmWRZvC2bNwpZ6PYaJxUOpjuwni2rMOuE/Orut6Zv0JZf1c3ngfqWDzONxsHLMZmTXOxI5WClVFD5c0MFQE2adM3hiWXULoA0nKY6SVGW5QsOLZVlOCSzTBuBx8CwXnuCrOiIJ8yHspYUyKvtZtBlo/77lIHJfqvuRUzbCmL+CcP0srkKc+KUTxW90Nt5f3g2P7f23geLIwQYaxtK4HWiSKDiKlClvrA2XmCDuk5h+0PXbTnWOBuGytlWeNmgsld49seqfqKwqCvz8g==","apple",80,"O2MhOMjoeXi2OPPTOTerIQuYf++wen89A2fNFUlqTrQi8pglrCRoEPjA+FqGHf7HvQGL9I2MSEPgtINJoW1RgdICN3N8bf1uo+xOF7E6F7D6gPenzfxSQ/mPd8CpXw/TpgnXIVtG9sOxcAUWK1xvw4o8iLbChjNpOXo1txXRMa+epUFyo4TgyAyb8I2UdBnjozXK3YY1oileG314CNwJ84TmN3j9BhIRzycx6MJD/YZZy2yJDaR/GpuWkI7XDJtn8t8JAbDS9XBKvERIAgX/povFJxDRrLaETyb/XS18s50F8k6MjNYX3XD9add+zwK51RfTuFg64wU955+ro3bclg==","pear",20);</script>
```
