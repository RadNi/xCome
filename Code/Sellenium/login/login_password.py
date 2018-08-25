import unittest

from selenium import webdriver
from test_utility import fields, static_data


# assume captcha is 1234
# Assume a user smjfas with pass 123 is not registered in system

class Login(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_login_password(self):
        driver = self.driver
        driver.get(static_data.base_url + "login")
        fields.get_components_by_name(driver, ["username=smjfas", "password=123",
                                               "submit"])[2].click()

        assert "login" in driver.current_url

    def tearDown(self):
        self.driver.close()
