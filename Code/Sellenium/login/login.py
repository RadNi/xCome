import unittest

from selenium import webdriver


# assume captcha is 1234

class Login(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_login(self):
        driver = self.driver
        driver.get("http://192.168.202.227/contact")
        username = driver.find_element_by_id("username")
        password = driver.find_element_by_id("password")
        captcha = driver.find_element_by_id("captcha")
        login = driver.find_element_by_id("login")
        # Assume a user smjfas with pass 1234567 is registered in system
        username.send_keys("smjfas")
        password.send_keys("1234567")
        captcha.send_keys("1234")
        login.click()
        assert "smjfas" in driver.current_url

    def tearDown(self):
        self.driver.close()
