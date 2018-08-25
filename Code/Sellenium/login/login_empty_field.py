import unittest

from selenium import webdriver
from test_utility import static_data, fields


# assume captcha is 1234

class Login(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_login_empty_username(self):
        driver = self.driver
        driver.get(static_data.base_url + "login")
        fields.get_components_by_name(driver, ["password=1234567",
                                               "submit"])[1].click()

        assert "login" in driver.current_url

    def test_login_empty_password(self):
        driver = self.driver
        driver.get(static_data.base_url + "login")
        fields.get_components_by_name(driver, ["username=smjfas",
                                               "submit"])[1].click()

        assert "login" in driver.current_url

    def tearDown(self):
        self.driver.close()
