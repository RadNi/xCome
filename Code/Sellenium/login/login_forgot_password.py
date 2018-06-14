import unittest

from selenium import webdriver
from test_utility import static_data


class Login(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_login_forget_password(self):
        driver = self.driver
        driver.get(static_data.base_url + "login")
        driver.find_element_by_id("forget").click()

        assert "forget" in driver.current_url

    def tearDown(self):
        self.driver.close()
