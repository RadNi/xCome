import unittest

from selenium import webdriver


class Login(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_login_forgot_password(self):
        driver = self.driver
        driver.get("http://192.168.201.238/login")
        forgot_password = driver.find_element_by_id("forget")

        forgot_password.click()
        assert "forget" in driver.current_url

    def tearDown(self):
        self.driver.close()
