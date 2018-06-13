import unittest

from selenium import webdriver


class UserInformation(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_user_inf(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/user/information")
        phone_num = driver.find_element_by_id("phonenumber")
        avatar = driver.find_element_by_id("avatar")
        password = driver.find_element_by_id("password")
        repass = driver.find_element_by_id("ret-password")
        email = driver.find_element_by_id("email")
        change = driver.find_element_by_id("change")
        phone_num.send_keys("09398604014")
        avatar.send_keys("me.jpg")
        password.send_keys("1234")
        repass.send_keys("1234")
        email.send_keys("smjfas@gmail.com")
        change.click()

        assert driver.find_element_by_id("successful") is not None

    def tearDown(self):
        self.driver.close()
