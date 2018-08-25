import unittest

from selenium import webdriver
from test_utility import static_data, fields


# Assume captcha is 1234

class Login(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_sql_injection(self):
        driver = self.driver
        driver.get(static_data.base_url + "login")
        fields.get_components_by_name(driver, ["username=select * from x_users", "password=1234567",
                                               "submit"])[2].click()

        assert "login" in driver.current_url

    def tearDown(self):
        self.driver.close()
