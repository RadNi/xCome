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
        fields.get_components_by_name(driver, ["username=smjfas", "password=123", "captcha=1234",
                                               "login"])[3].click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
