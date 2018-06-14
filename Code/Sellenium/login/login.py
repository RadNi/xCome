import unittest

from selenium import webdriver
from test_utility import fields, static_data


# Assume captcha is 1234
# Assume a user smjfas with pass 1234567 is registered in system

class Login(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_login(self):
        driver = self.driver
        driver.get(static_data.base_url + "login")
        fields.get_components_by_name(driver, ["username=smjfas", "password=1234567", "captcha=1234",
                                               "login"])[3].click()

        assert "smjfas" in driver.current_url

    def tearDown(self):
        self.driver.close()
